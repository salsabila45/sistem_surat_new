<?= $this->extend('layouts/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="w-full px-6 py-6 mx-auto">

  <!-- row 1 -->
  <div class="flex flex-wrap -mx-3 mb-4 justify-center">
    <!-- card1 -->
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
      <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="flex-auto p-4">
          <div class="flex flex-row -mx-3">
            <div class="flex-none w-2/3 max-w-full px-3">
              <div>
                <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase  dark:opacity-60">Surat Diajukan</p>
                <h5 class="mb-2 font-bold "><?= $pengajuan['totalDiajukan'] ?></h5>
              </div>
            </div>
            <div class="px-3 text-right basis-1/3">
              <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500">
                <i class="ni leading-none ni-single-copy-04 text-lg relative top-3.5 text-white"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- card2 -->
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
      <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="flex-auto p-4">
          <div class="flex flex-row -mx-3">
            <div class="flex-none w-2/3 max-w-full px-3">
              <div>
                <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase  dark:opacity-60">Pengajuan diproses</p>
                <h5 class="mb-2 font-bold "><?= $pengajuan['totalVerifikasi'] ?></h5>
              </div>
            </div>
            <div class="px-3 text-right basis-1/3">
              <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-red-600 to-orange-600">
                <i class="ni leading-none ni-single-copy-04 text-lg relative top-3.5 text-white"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- card3 -->
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
      <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="flex-auto p-4">
          <div class="flex flex-row -mx-3">
            <div class="flex-none w-2/3 max-w-full px-3">
              <div>
                <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase  dark:opacity-60">Pengajuan Selesai</p>
                <h5 class="mb-2 font-bold "><?= $pengajuan['totalSelesai'] ?></h5>
              </div>
            </div>
            <div class="px-3 text-right basis-1/3">
              <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-emerald-500 to-teal-400">
                <i class="ni leading-none ni-single-copy-04 text-lg relative top-3.5 text-white"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- card3 -->
    <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
      <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
        <div class="flex-auto p-4">
          <div class="flex flex-row -mx-3">
            <div class="flex-none w-2/3 max-w-full px-3">
              <div>
                <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase  dark:opacity-60">Total Pengajuan</p>
                <h5 class="mb-2 font-bold "><?= $pengajuan['totalPengajuan'] ?></h5>
              </div>
            </div>
            <div class="px-3 text-right basis-1/3">
              <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-emerald-500 to-teal-400">
                <i class="ni leading-none ni-single-copy-04 text-lg relative top-3.5 text-white"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- cards row 2 -->
  <div class="flex flex-wrap mt-6 -mx-3 gap-6 lg:gap-0">
    <div class="w-full max-w-full px-3 lg:w-8/12 lg:flex-none">
      <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
        <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
          <h6 class="capitalize ">Pengajuan Terbaru</h6>
        </div>
        <div class="pb-4 overflow-x-auto">
          <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500 px-6">
            <thead class="align-bottom">
              <tr>
                <?php foreach (['Nama Pemohon', 'jenis Surat', 'Tanggal Pengajuan', 'Tanggal Selesai', 'status'] as $tabTitle) : ?>
                  <th class="py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"><?= $tabTitle ?></th>
                <?php endforeach; ?>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($pengajuanSurat as $index => $pengajuan): ?>
                <tr>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 font-semibold leading-tight text-xs"><?= $pengajuan['nama'] ?></p>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 font-semibold leading-tight text-xs"><?= $pengajuan['jenis_surat'] ?></p>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 font-semibold leading-tight text-xs"><?= $pengajuan['tanggal_pengajuan'] ?></p>
                  </td>
                  <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                    <p class="mb-0 font-semibold leading-tight text-xs"><?= $pengajuan['tanggal_selesai'] ?? '-' ?></p>
                  </td>
                  <td class="p-2 leading-normal text-left align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                    <?php if ($pengajuan['status'] == 'selesai') : ?>
                      <span class="py-1.4 px-2.5 text-xs rounded-1.8 inline-block whitespace-nowrap text-center bg-gradient-to-tl from-emerald-500 to-teal-400 align-baseline font-bold uppercase leading-none text-white"><?= $pengajuan['status'] ?></span>
                    <?php elseif ($pengajuan['status'] == 'diajukan') : ?>
                      <span class="py-1.4 px-2.5 text-xs rounded-1.8 inline-block whitespace-nowrap text-center bg-gradient-to-tl from-blue-700 to-cyan-500 align-baseline font-bold uppercase leading-none text-white"><?= $pengajuan['status'] ?></span>
                    <?php elseif ($pengajuan['status'] == 'verifikasi') : ?>
                      <span class="py-1.4 px-2.5 text-xs rounded-1.8 inline-block whitespace-nowrap text-center bg-gradient-to-tl from-orange-500 to-yellow-500 align-baseline font-bold uppercase leading-none text-white"><?= $pengajuan['status'] ?></span>
                    <?php elseif ($pengajuan['status'] == 'ditolak') : ?>
                      <span class="py-1.4 px-2.5 text-xs rounded-1.8 inline-block whitespace-nowrap text-center bg-gradient-to-tl from-red-600 to-orange-600 align-baseline font-bold uppercase leading-none text-white"><?= $pengajuan['status'] ?></span>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>


    <div class="w-full max-w-full px-3 mt-0 lg:w-4/12 lg:flex-none">
      <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
        <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
          <h6 class="capitalize ">Pengajuan Surat (30 hari)</h6>
          <p class="mb-0 text-sm leading-normal dark:opacity-60">
            <span class="font-semibold">Total pengajuan surat : </span> <?= $pengajuan1B['totalPengajuan'] ?>
          </p>
        </div>
        <div class="flex-auto p-4">
          <div>
            <canvas id="chart-bars-dashboard" height="300"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
  const totalDiajukan1B = <?= json_encode($pengajuan1B['totalDiajukan']) ?>;
  const totalVerifikasi1B = <?= json_encode($pengajuan1B['totalVerifikasi']) ?>;
  const totalSelesai1B = <?= json_encode($pengajuan1B['totalSelesai']) ?>;
  const totalPengajuan1B = <?= json_encode($pengajuan1B['totalPengajuan']) ?>;
</script>
<?= $this->endSection(); ?>