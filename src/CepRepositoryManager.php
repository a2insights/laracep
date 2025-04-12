<?php

namespace A2insights\Laracep;

use A2insights\Laracep\Contracts\CepRepositoryContract;
use A2insights\Laracep\Address;
use A2insights\Laracep\Repositories\RepositoryAbstract;

class CepRepositoryManager implements CepRepositoryContract
{
    /**
     * @var RepositoryAbstract[]
     */
    protected array $repositories = [];
    protected int $currentIndex = 0;

    public function addRepository(CepRepositoryContract $repository): self
    {
        if (!$repository instanceof RepositoryAbstract) {
            throw new \InvalidArgumentException('Repository must be an instance of RepositoryAbstract');
        }

        $this->repositories[] = $repository;
        return $this;
    }

    public function get(string $cep): ?array
    {
        if (empty($this->repositories)) {
            throw new \RuntimeException('No CEP repositories configured');
        }

        $attempts = 0;
        $maxAttempts = count($this->repositories);

        while ($attempts < $maxAttempts) {
            $repository = $this->getNextRepository();

            try {
                $address = $repository->get($cep);
                if ($address !== null) {
                    return $address;
                }
            } catch (\Exception $e) {
                // Log error if needed
                continue;
            }

            $attempts++;
        }

        return null;
    }

    protected function getNextRepository(): CepRepositoryContract
    {
        $repository = $this->repositories[$this->currentIndex];
        $this->currentIndex = ($this->currentIndex + 1) % count($this->repositories);
        return $repository;
    }
}
