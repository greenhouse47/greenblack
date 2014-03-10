<?php
/**
 * Template Name: Documentation - Domain Setting
 *
 * @package WordPress
 * @subpackage BootstrapWP
 */
get_header();
wp_enqueue_script('prettify-js');
wp_enqueue_style('prettify-css');
wp_enqueue_style('docs-css');
?>
<?php while (have_posts()) : the_post(); ?>

<header class="jumbotron subhead" id="overview">
	<div class="container">
		<h1>
			<?php the_title(); ?></h1>
		<p class="lead">
			Petunjuk dasar penerapan langkah-langkah untuk pengalihan nama domain ke Blogspot dan pemindahan/ transfer nama domain ke DNS/NS server.
		</p>
	</div>
</header>

<div class="container">

	<div class="row">

		<div class="span3 bs-docs-sidebar">
			<ul class="nav nav-list bs-docs-sidenav">
				<li>
					<a href="#ikhtisar"> <i class="icon-chevron-right"></i>
						Ikhtisar
					</a>
				</li>
				<li>
					<a href="#fitur-fungsi">
						<i class="icon-chevron-right"></i>
						Fitur Blogspot
					</a>
				</li>
				<li>
					<a href="#setting-domain">
						<i class="icon-chevron-right"></i>
						Setting Domain
					</a>
				</li>

			</ul>
		</div>

		<div class="span9">

			<section id="ikhtisar">
				<div class="page-header">
					<h1>Ikhtisar Blogger</h1>
				</div>
				<div><img itemprop="logo" src="<?php echo get_template_directory_uri();?>/templates-documentation/assets/img/blogger.png"></div>
				<h3>Sejarah Singkat</h3>
				<p>Pada 23 Agustus 1999, Blogger diluncurkan oleh <a href="http://id.wikipedia.org/wiki/Pyra_Labs" target="_blank">Pyra Labs</a>. Sebagai salah satu perangkat publikasi blog pertama di dunia, <a href="http://www.blogger.com/" target="_blank">Blogger</a> berperan dalam mempopulerkan format blog di dunia. Pada Februari 2003, Pyra Labs diakusisi oleh Google, membuat sejumlah fitur premium Blogger yang sebelumnya dikomersialkan Pyra Labs menjadi layanan yang sepenuhnya gratis. Pada Oktober 2004, salah satu pendiri Pyra Labs, Evan Williams, mengundurkan diri dari Google.
				<p>Blog merupakan singkatan dari web log adalah bentuk aplikasi web yang menyerupai tulisan-tulisan (<em>yang dimuat sebagai posting</em>) pada sebuah halaman web umum. Tulisan-tulisan ini seringkali dimuat dalam urut terbalik (<em>isi terbaru dahulu baru kemudian diikuti isi yang lebih lama</em>), meskipun tidak selamanya demikian. Situs web seperti ini biasanya dapat diakses oleh semua pengguna Internet sesuai dengan topik dan tujuan dari si pengguna blog tersebut.</p>
				</p>
				<p>Pada tahun 2004, Google membeli <a href="http://id.wikipedia.org/wiki/Picasa" target="_blank">Picasa</a>, dan mengintegrasikannya dengan Blogger sehingga pengguna Picasa dapat mempublikasikan koleksi foto miliknya ke situs blognya. Pada 9 Mei 2004, Blogger memperkenalkan beberapa perubahan besar pada sistem publikasi blognya, menambahkan fitur seperti templat yang memenuhi standar web, halaman arsip individual untuk masing-masing posting dan komentar, serta fitur posting melalui email.</p>
				<p>
Pada 14 Agustus 2006, Blogger meluncurkan versi terbarunya dalam tahap beta, yang diberi nama kode <em>"Invader"</em>. Versi terbaru ini memigrasikan pengguna Blogger ke server milik Google dan menambahkan beberapa fitur baru. Pada Desember 2006, versi baru ini keluar dari tahap beta. Mei 2007, Blogger selesai memigrasikan semua data penggunanya ke server Google.</p>

			</section>

			<section id="fitur-fungsi">
				<div class="page-header">
					<h1>Fitur Blogspot</h1>
				</div>
				<div><img itemprop="logo" src="<?php echo get_template_directory_uri();?>/templates-documentation/assets/img/fitur-blogspot.png"></div>
				<h3>Backend Blogspot</h3>
				<p>Blogspot juga merupakan salah satu type aplikasi CMS (<em>Content Management System</em>) seperti halnya yang dimiliki oleh WordPress. Tidak jauh beda dengan fitur backend yang ada pada WordPress, hanya saja aplikasi CMS Blogspot ini tidak diopen untuk publik dan yang dipakai sekarang ada model system multisite yang di control langsung pada inti website. Untuk segala pengeloaan dan pengembangan ini dipegang langsung oleh Google. Adapun fitur dalam backend yang ada pada blogspot tersebut, diantaranya:</p>
				<ol>
				<li>Gratis. Untuk mendapatkan perangkat lunak WordPress hanya perlu mengunduh dari situsnya tanpa dipungut biaya, bahkan untuk blog komersial sekalipun.</li>
				<li>Berbasis kode sumber terbuka (open source).</li>
				<li>Templat atau desain tampilannya mudah dimodifikasi sesuai keinginan pengguna.</li>
				<li>Pengoperasiannya mudah.</li>
				<li>Satu blog WordPress, dapat digunakan untuk banyak pengguna (multi user). Sehingga WordPress juga sering digunakan untuk blog komunitas. Anggota komunitas tersebut dapat berperan sebagai kontributor.</li>
				<li>Komunitas Pendukung (community support) WordPress sudah tersebar dan banyak didunia.</li>
				<li>Supporting Plugin/ Addon/ Modul yang langsung terhubung dengan pengembang WordPress.</li>
				<li>Fasilitas Trackback dan Pingback. Juga memiliki kemampuan untuk melakukan otomatis Ping (RPC Ping) ke berbagai search engine dan web directory, sehingga website yang dibuat dengan Wordpress akan lebih cepat ter index pada search engine.</li>
				<li>Mempunyai kemampuan optimalisasi yang baik pada Mesin Pencari (Search Engine Optimizer).</li>
				</ol>

			</section>

			<section id="setting-domain">
				<div class="page-header">
					<h1>Setting Domain</h1>
				</div>
				<div><img itemprop="logo" src="<?php echo get_template_directory_uri();?>/templates-documentation/assets/img/domain-setting.png"></div>
				<h3>Langkah untuk Pengalihan Domain</h3>
				<pclass="alert alert-error">Untuk yang pertama seorang user harus login dulu ke blogger mengggunakan ID/ email anda untuk masuk pada blog yang akan mau dirubah alamat domainnya, dan seterusnya masuk pada setting/ setelan pilih dasar yang didalamnya ada pengaturan untuk alamat blog.</p>
				<div><img itemprop="logo" src="<?php echo get_template_directory_uri();?>/templates-documentation/assets/img/dashboard-blog.jpg"></div>
				<p class="alert alert-error">Cara merubah nama blog anda sesuai dengan domain yang akan dituju klik link/perintah <span class="label label-success">“Tambahkan domain khusus”.</span>
				<div><img itemprop="logo" src="<?php echo get_template_directory_uri();?>/templates-documentation/assets/img/setting-blogspot.jpg"></div>
				<p class="alert alert-error">Disitu ada dua pilihan yaitu domain yang didaftarkan melalui mitra google dan biayannya juga tertera disitu untuk pertahunnya, dan ada pilihan untuk mengarahkan ke domain sesuai dengan keinginan sendiri yaitu dalam bentuk link <span class="label label-success">“Alihkan ke setelan lanjutan”.</span> Pilih dan klik pilihan tersebut, maka akan muncul form kosong untuk diisi alamat domain yang di inginkan dan klik tombol simpan.</p>
				<div><img itemprop="logo" src="<?php echo get_template_directory_uri();?>/templates-documentation/assets/img/input-nama-domain-blogspot.jpg"></div>
				<div class="alert alert-error">				
				<p>Selanjutnya akan muncul pentunjuk untuk pengaturan pada <span class="label label-warning">CNAME</span> pada blog anda untuk memverifikasi nama domain tersebut. Disitu akan muncul pengaturan <span class="label label-warning">2 CNAME</span> untuk pengaturan pada domain yang akan diaktifkan, pengaturan pilihan utama <span class="label label-info">“nama, label, atau Host”</span> dan <span class="label label-info">“Tujuan, target, atau mengarah ke”</span>, harap dicatat untuk pilihan pengaturan tersebut masing-masing ada 2 pilihan.</p>
			<table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: auto;">Bidang Nama, Label, atau Host	Bidang</th>
                                    <th>Tujuan, Target, atau Mengarah Ke</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>www</td>
                                    <td>
                                        ghs.google.com
                                    </td>
                                </tr>
				<tr>
                                    <td>dnfsyti****</td>
                                    <td>
                                        *******************.dv.googlehosted.com
                                    </td>
                                </tr>
                            </tbody>
                        </table>
				
				<div class="alert alert-info">Pada umumnya apibila anda menggunakan  On a top-level domain <b><em>(www.example.com)</em></b> ada dua pengaturan setelah cname yaitu A-records <b></em>(optional)</em></b> dengan isian <b>4 baris alamat IP</b>. Masukkan nama domain Anda dalam format example.com, lalu masukkan alamat I.P. yang ditampilkan di bawah bagian <b>“A”</b>. Anda perlu membuat <b>A-records</b> terpisah yang mengarah ke empat <b>IP Google berbeda</b>.</div>
				<div style="text-align:center;" class="alert alert-info">
				<p class="btn btn-large btn-primary disabled">216.239.32.21</p>
				<p class="btn btn-large btn-primary disabled">216.239.34.21</p>
				<p class="btn btn-large btn-primary disabled">216.239.36.21</p>
				<p class="btn btn-large btn-primary disabled">216.239.38.21</p>
				</div>
				<div style="text-align:center;" class="alert alert-warning">Untuk lebih detail kunjungi halaman sumber: <a class="btn" href="https://support.google.com/blogger/answer/1734119?hl=en&ref_topic=1734115" target="_blank">Readmore</a></div>
				<p>Apabila pengaturan CNAME tersebut masih belum ada setingan pada DNS domain yang ditujukan maka disitu akan tertera keterangan:</p>
				<div class="alert alert-warning">“ Kami tidak dapat memverifikasi otoritas Anda untuk domain ini. Kesalahan 12. ”</div>
				</div>
				<h3>Test Drive</h3>
				<div><img itemprop="logo" src="<?php echo get_template_directory_uri();?>/templates-documentation/assets/img/test-domain.jpg"></div>
				<p class="alert alert-error">Untuk mengujinya Anda bisa langsung menuju ke alamat website yang telah disetting pada Dashboard Blogspot Anda. Apabila Anda menjumpai tampilan seperti pada screenshot diatas Anda tinggal mengaktifkan nama domain tersebut dengan tekan tombol "yes".</p>
				<p>Beberapa catatan penting untuk dicermati.</p>
				<div class="alert alert-error">
				<ol>
				<li>Jika domain baru Anda tidak meneruskan ke blog Anda, tunggu satu atau dua hari lagi untuk memastikan semua server DNS telah diperbarui.</li>
				<li>Jika masih tidak bisa, hubungi tim pengembang kami, lewat email atau chatting untuk memastikan bahwa DNS alamat domain yang Anda inginkan sudah diproses dan dipasang pada server.</li>
				<li>Alamat Blogspot asli Anda akan secara otomatis meneruskan ke domain baru Anda. Dengan demikian, tautan atau bookmarks ke situs Anda saat ini akan tetap dapat digunakan.</li>
				</ol>				
				</div>

			</section>

	</div>
</div>

</div>

<?php endwhile; ?>
<?php get_footer(); ?>
