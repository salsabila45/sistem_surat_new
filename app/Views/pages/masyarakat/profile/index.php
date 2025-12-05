<?= $this->extend('layouts/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="relative h-full max-h-screen transition-all duration-200 ease-in-out">
    <div class="w-full p-6 mx-auto">
        <div class="flex flex-wrap -mx-3 gap-4 md:gap-0!">
            <div class="w-full max-w-full px-3 mt-6 shrink-0 md:w-4/12 md:flex-0 md:mt-0">
                <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="flex flex-wrap justify-center -mx-3">
                        <div class="w-3/12 max-w-full px-3 flex-0 ">
                            <div class="mt-10">
                                <?php if ($dataWarga['foto']): ?>
                                    <img class="mx-auto w-full h-auto aspect-square! max-w-full border-2 border-white border-solid rounded-circle" src="/uploads/foto_warga/<?= $dataWarga['foto'] ?>" alt="profile image">
                                <?php else : ?>
                                    <div class="w-full h-auto aspect-1/1 bg-slate-200 rounded-full flex items-center justify-center">
                                        <span class="text-sm">Upload</span>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>

                    <form action="profile/update-photo" method="post" class="mt-2 mx-auto" id="formProfile" enctype="multipart/form-data">
                        <div class="relative w-max">
                            <p href="" class="left-0 text-center text-sm text-blue-800 underline hover:cursor-pointer">Edit Profile <i class="ml-1 fas fa-pencil-alt text-sm" aria-hidden="true"></i></p>
                            <input type="file" name="foto" id="profile_picture" class="absolute top-0 left-0 w-full h-full opacity-0 hover:cursor-pointer">
                        </div>
                    </form>

                    <div class="flex-auto p-6 pt-0">
                        <table class="w-full">
                            <tbody>
                                <tr>
                                    <td class="mb-0 text-xs font-semibold leading-tight dark:opacity-80">NIK </td>
                                    <td class="text-center">:</td>
                                    <td class="mb-0 text-sm leading-normal"><?= $dataWarga['nik'] ?></td>
                                </tr>
                                <tr>
                                    <td class="mb-0 text-xs font-semibold leading-tight dark:opacity-80">Nama Lengkap</td>
                                    <td class="text-center">:</td>
                                    <td class="mb-0 text-sm leading-normal"><?= $dataWarga['nama_lengkap'] ?></td>
                                </tr>
                                <tr>
                                    <td class="mb-0 text-xs font-semibold leading-tight dark:opacity-80">Alamat </td>
                                    <td class="text-center">:</td>
                                    <td class="mb-0 text-sm leading-normal"><?= $dataWarga['alamat'] ?></td>
                                </tr>
                                <tr>
                                    <td class="mb-0 text-xs font-semibold leading-tight dark:opacity-80">No. Hp </td>
                                    <td class="text-center">:</td>
                                    <td class="mb-0 text-sm leading-normal"><?= $dataWarga['no_hp'] ?></td>
                                </tr>
                                <tr>
                                    <td class="mb-0 text-xs font-semibold leading-tight dark:opacity-80">Email </td>
                                    <td class="text-center">:</td>
                                    <td class="mb-0 text-sm leading-normal"><?= $dataWarga['email'] ?></td>
                                </tr>
                                <tr>
                                    <td class="mb-0 text-xs font-semibold leading-tight dark:opacity-80">Jenis Kelamin </td>
                                    <td class="text-center">:</td>
                                    <td class="mb-0 text-sm leading-normal"><?= $dataWarga['jenis_kelamin'] == "L" ? 'Laki Laki' : 'Perempuan' ?></td>
                                </tr>
                                <tr>
                                    <td class="mb-0 text-xs font-semibold leading-tight dark:opacity-80">Agama </td>
                                    <td class="text-center">:</td>
                                    <td class="mb-0 text-sm leading-normal"><?= $dataWarga['agama'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-0">
                <div class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                    <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                        <div class="flex items-center">
                            <h6>Edit Profile</h6>
                        </div>
                    </div>
                    <div class="flex-auto p-6">
                        <form action="/masyarakat/profile/update" method="post" enctype="multipart/form-data">
                            <?= view('components/alert') ?>
                            <div class="flex flex-wrap -mx-3">
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <label for="nik" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">NIK</label>
                                        <input type="text" name="nik" value="<?= $dataWarga['nik'] ?>" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                    </div>
                                </div>
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <label for="nama_lengkap" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Nama Lengkap</label>
                                        <input type="nama_lengkap" name="nama_lengkap" value="<?= $dataWarga['nama_lengkap'] ?>" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                    </div>
                                </div>
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <label for="tempat_lahir" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" value="<?= $dataWarga['tempat_lahir'] ?>" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                    </div>
                                </div>
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <label for="tanggal_lahir" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" value="<?= $dataWarga['tanggal_lahir'] ?>" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                    </div>
                                </div>
                                <div class="w-full max-w-full px-3 shrink-0 md:w-full md:flex-0">
                                    <div class="mb-4">
                                        <label for="alamat" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Alamat</label>
                                        <input type="text" name="alamat" value="<?= $dataWarga['alamat'] ?>" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                    </div>
                                </div>
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <label for="no_hp" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">No Hp</label>
                                        <input type="text" name="no_hp" value="<?= $dataWarga['no_hp'] ?>" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                    </div>
                                </div>
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <label for="email" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Email</label>
                                        <input type="text" name="email" value="<?= $dataWarga['email'] ?>" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                    </div>
                                </div>
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <label for="jenis_kelamin" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="" class="text-sm focus:shadow-primary-outline leading-5.6 ease block w-full rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow">
                                            <option value="L" <?= $dataWarga['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki Laki</option>
                                            <option value="P" <?= $dataWarga['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                    <div class="mb-4">
                                        <label for="agama" class="inline-block mb-2 ml-1 font-bold text-xs text-slate-700 dark:text-white/80">Agama</label>
                                        <input type="text" name="agama" value="<?= $dataWarga['agama'] ?>" class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    document.getElementById('profile_picture').addEventListener('change', function() {
        if (this.files.length > 0) {
            document.getElementById('formProfile').submit();
        }
    });
</script>
<?= $this->endSection() ?>