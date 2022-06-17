<?php

declare(strict_types=1);

namespace App\Http\Presenters\Movie;

use App\Models\Movie;
use Illuminate\Pagination\LengthAwarePaginator;

class MovieAsPaginationArrayPresenter
{
    public function present(Movie $movie): array
    {
        (array)$arrayMovie = [
            'id' => $movie->getId(),
            'name' => $movie->getName(),
            'description' => $movie->getDescription(),
            'releaseDate' => $movie->getReleaseDate(),
            'isLiked' => $movie->getIsLiked(),
        ];

        return $arrayMovie;
    }

    public function presentCollection(LengthAwarePaginator $paginator): array
    {
        $result['items'] = collect($paginator->items())
            ->map(
                fn (Movie $movie) => $this->present($movie)
            )
            ->all();
        $result['previousPageUrl'] = $paginator->previousPageUrl();
        $result['nextPageUrl'] = $paginator->nextPageUrl();
        $result['perPage'] = $paginator->perPage();
        $result['total'] = $paginator->total();
        $result['currentPage'] = $paginator->currentPage();
        $result['lastPage'] = $paginator->lastPage();

        return $result;
    }
}
