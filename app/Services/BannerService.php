<?php
namespace App\Services;

use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Banner;
use App\Repositories\BannerRepository;
use App\Traits\HandleImage;
use Illuminate\Http\Client\Request;

class BannerService {

    use HandleImage;

    protected string $folder = 'banners';

    protected BannerRepository $bannerRepository;

    public function __construct(BannerRepository $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }

    public function getListBanners()
    {
        return $this->bannerRepository->latest()->paginate();
    }

    public function createBanner(StoreBannerRequest $request)
    {
        $dataBanner = $request->all();
        $dataBanner['title'] = htmlspecialchars($request->input('title'));
        $dataBanner['content'] = htmlspecialchars($request->input('content'));
        $dataBanner['image'] = $this->saveImage($request->file('image'));
        return $this->bannerRepository->create($dataBanner);
    }

    public function updateBanner(UpdateBannerRequest $request, $id)
    {
        $bannerModel = $this->bannerRepository->find($id);
        if ($request->mergeIfMissing([
            'status' => 0
        ]));
        $dataBanner = $request->all();
        $this->bannerRepository->model->folder;
        $dataBanner['title'] = htmlspecialchars($request->input('title'));
        $dataBanner['content'] = htmlspecialchars($request->input('content'));
        $dataBanner['image'] = $this->updateImage($request->file('image'), $bannerModel->image);
        return $this->bannerRepository->update($dataBanner, $id);
    }

    public function delete(Banner $banner): ?bool
    {
        return $banner->delete();
    }
}
