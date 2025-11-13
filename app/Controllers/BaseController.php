<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\BeritaModel;
use App\Models\JenisSuratModel;
use App\Models\KategoriModel;
use App\Models\KopSuratModel;
use App\Models\LampiranPengajuanModel;
use App\Models\MenuModel;
use App\Models\PengajuanSuratModel;
use App\Models\SysConfigModel;
use App\Models\TemplateSuratModel;
use App\Models\WargaModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    protected $session;
    protected $user = [];
    protected $pengajuanModel;
    protected $adminModel;
    protected $wargaModel;
    protected $jenisSuratModel;
    protected $beritaModel;
    protected $kategoriModel;
    protected $sysConfigModel;
    protected $templateSuratModel;
    protected $menuModel;
    protected $lampiranModel;
    protected $kopSuratModel;

    protected $namaHalaman;
    protected $currentUrl;


    protected function getSiteLogo()
    {
        return $this->sysConfigModel->where('key', 'site_logo')->first();
    }

    protected function getSiteName()
    {
        return $this->sysConfigModel->where('key', 'site_name')->first();
    }

    protected function getHalamanIni($url)
    {
        // Extract base path (first 2 segments)
        $basePath = $this->extractBasePath($url);

        return $this->menuModel->where('url', '/' . $basePath)->first();
    }

    /**
     * Extract base path from URL (first 2 segments)
     */
    private function extractBasePath($url)
    {
        // Remove protocol and domain if present
        $path = parse_url($url, PHP_URL_PATH);

        // Remove leading/trailing slashes and explode into segments
        $segments = explode('/', trim($path, '/'));

        // Take first 2 segments
        $baseSegments = array_slice($segments, 0, 2);

        return implode('/', $baseSegments);
    }

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        $this->session = session();
        $this->user = session('user') ?? [];
        $this->pengajuanModel = new PengajuanSuratModel();
        $this->adminModel = new AdminModel();
        $this->wargaModel = new WargaModel();
        $this->jenisSuratModel = new JenisSuratModel();
        $this->beritaModel = new BeritaModel();
        $this->kategoriModel = new KategoriModel();
        $this->sysConfigModel = new SysConfigModel();
        $this->templateSuratModel = new TemplateSuratModel();
        $this->menuModel = new MenuModel();
        $this->lampiranModel = new LampiranPengajuanModel();
        $this->currentUrl = $request->getUri()->getPath();
        $this->kopSuratModel = new KopSuratModel();

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = service('session');
    }
}
