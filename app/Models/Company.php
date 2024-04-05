<?php

namespace App\Models;

use App\Http\Requests\CompanyRequest;
use App\Traits\FormatDateTrait;
use App\Traits\MediaTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Company extends Model
{
    use HasFactory, MediaTrait, Sluggable, FormatDateTrait;

    protected $fillable = [
        'title',
        'slug',
        'logo',
    ];

    public static function getCompanies(int $limit = null, int $paginate = null, int $except = null, $with = [])
    {
        $companies = self::query();

        $companies->when($with, function (Builder $query) use ($with) {
            $query->with($with);
        });
        $companies->when($limit, function (Builder $query) use ($limit) {
            $query->limit($limit);
        });
        $companies->when($except, function (Builder $query) use ($except) {
            $query->whereNot('id', $except);
        });
        $companies->orderBy('title');

        return $paginate ? $companies->paginate($paginate) : $companies->get();
    }

    public static function createCompany(CompanyRequest $request)
    {
        $data = $request->validated();
        $data['logo'] = self::uploadLogo($request);

        /** @var Company $company */
        $company = self::query()->create($data);

//        TemporaryFile::clearTmpFiles();
        return $company;
    }

    public static function updateCompany(CompanyRequest $request, self $company)
    {
        $data = $request->validated();
        $data['logo'] = self::uploadLogo($request, $company->logo);

//        TemporaryFile::clearTmpFiles();
        return $company->update($data);
    }

    public static function deleteCompany(self $company)
    {
        Storage::delete($company->logo);

        return $company->delete();
    }

    public static function uploadLogo(Request $request, $image = null)
    {
        return self::uploadMaterialFilepond(
            storage_path: 'companies',
            key: 'logo',
            request: $request,
            file: $image,
        );
    }

    public function getLogo()
    {
        return self::getMedia('logo');
    }

    public function __toString()
    {
        return $this->title;
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
