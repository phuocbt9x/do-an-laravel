<?php

namespace App\Http\Controllers;

use App\Enums\BannerPosition;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Banner;
use App\Services\BannerService;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class BannerController extends Controller
{
    protected BannerService $bannerService;

    public function __construct(BannerService $bannerService)
    {
        $this->bannerService = $bannerService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $banners = $this->bannerService->getListBanners();
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $positions = BannerPosition::asSelectArray();
        return view('admin.banners.action', compact('positions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequest $request)
    {
        $this->bannerService->createBanner($request);
        return redirect()->route('banner.create')
            ->with('success', 'Thêm danh mục mới thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner): View
    {
        return view('admin.banners.detail', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        $positions = BannerPosition::asSelectArray();
        return view('admin.banners.action', compact('positions', 'banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        $this->bannerService->updateBanner($request, $banner->id);
        return redirect()->route('banner.index')
            ->with('success', 'Cập nhật banner thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $this->bannerService->delete($banner);
        return response()->json([
            'href' => route('banner.index'),
        ], Response::HTTP_OK);
    }
}
