<?php

namespace A2insights\Laracep;

use A2insights\Laracep\Repositories\CORREIOSRepository;
use A2insights\Laracep\Repositories\RepositoryAbstract;
use A2insights\Laracep\Repositories\VIARepository;
use Illuminate\Support\Str;
use Illuminate\Container\Container;

class Cep
{
    private static ?CepRepositoryManager $manager = null;
    private static ?Container $container = null;

    public static function get($cep): ?array
    {
        return self::getManager()->get($cep);
    }

    public static function setContainer(Container $container): void
    {
        self::$container = $container;
    }

    public static function getManager(): CepRepositoryManager
    {
        if (self::$manager === null) {
            self::$manager = self::createManager();
        }

        return self::$manager;
    }

    public static function resetManager(): void
    {
        self::$manager = null;
    }

    protected static function createManager(): CepRepositoryManager
    {
        $manager = new CepRepositoryManager();

        // Get default repository from config
        $defaultRepo = self::getRepositoryClass(self::getConfig('default', 'via'));
        $defaultRepository = self::make($defaultRepo);

        // Configure fallbacks for default repository
        self::configureFallbacks($defaultRepository, self::getConfig('fallbacks', []));

        $manager->addRepository($defaultRepository);

        // Add alternative repositories
        foreach (self::getConfig('alternatives', []) as $alternative) {
            $repoClass = self::getRepositoryClass($alternative);
            $repository = self::make($repoClass);

            // Configure fallbacks for this alternative
            $fallbacks = self::getConfig("services.{$alternative}.fallbacks", []);
            self::configureFallbacks($repository, $fallbacks);

            $manager->addRepository($repository);
        }

        return $manager;
    }

    protected static function getRepositoryClass(string $service): string
    {
        $className = 'A2insights\\Laracep\\Repositories\\' . Str::studly($service) . 'Repository';
        if (!class_exists($className)) {
            throw new \RuntimeException("CEP repository class not found: {$className}");
        }

        return $className;
    }

    protected static function configureFallbacks(RepositoryAbstract $repository, array $fallbacks): void
    {
        foreach ($fallbacks as $fallback) {
            $clientClass = 'A2insights\\Laracep\\Clients\\' . Str::studly($fallback) . 'Client';
            if (class_exists($clientClass)) {
                $repository->addFallbackClient($clientClass);
            }
        }
    }

    protected static function getConfig(string $key, $default = null)
    {
        if (function_exists('config')) {
            return config("cep.{$key}", $default);
        }

        // Fallback configuration when Laravel isn't available
        $fallbackConfig = [
            'default' => 'via',
            'fallbacks' => ['postmon', 'correios'],
            'alternatives' => ['webmania'],
            'services' => [
                'webmania' => [
                    'fallbacks' => ['correios'],
                ],
            ],
        ];

        return data_get($fallbackConfig, $key, $default);
    }

    protected static function make(string $abstract)
    {
        if (self::$container) {
            return self::$container->make($abstract);
        }

        if (function_exists('app')) {
            return app($abstract);
        }

        // Fallback instantiation when container isn't available
        return new $abstract();
    }
}
