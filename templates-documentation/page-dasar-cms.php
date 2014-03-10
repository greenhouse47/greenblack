<?php
/**
 * Template Name: Documentation - Dasar CMS WP
 *
 * @package WP-Bootstrap
 * @subpackage Default_Theme
 * @since WP-Bootstrap 0.87
 *
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
			Pengenalan Platform Content Management System (<em>CMS</em>) WordPress sebagai engine untuk membangun dan mengoperasikan sebuah website dengan system database.
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
						Fitur WordPress
					</a>
				</li>
				<li>
					<a href="#desain-interface">
						<i class="icon-chevron-right"></i>
						Desain Interface
					</a>
				</li>
				<li>
					<a href="#pengaturan-themes">
						<i class="icon-chevron-right"></i>
						Pengaturan Themes
					</a>
				</li>
				<li>
					<a href="#modul-plugin-addons">
						<i class="icon-chevron-right"></i>
						Modul, Plugin, Addons
					</a>
				</li>
				<li>
					<a href="#widget">
						<i class="icon-chevron-right"></i>
						Pengaturan Widget
					</a>
				</li>
				<li>
					<a href="#navigasi">
						<i class="icon-chevron-right"></i>
						Menu Navigation
					</a>
				</li>
				<li>
					<a href="#post-pages">
						<i class="icon-chevron-right"></i>
						Posts dan Pages Content
					</a>
				</li>
				<li>
					<a href="#media-object">
						<i class="icon-chevron-right"></i>
						Media Object
					</a>
				</li>
				<li>
					<a href="#eksport-import">
						<i class="icon-chevron-right"></i>
						Export & Import
					</a>
				</li>
				<li>
					<a href="#general-setting">
						<i class="icon-chevron-right"></i>
						Settings
					</a>
				</li>

			</ul>
		</div>

		<div class="span9">

			<section id="ikhtisar">
				<div class="page-header">
					<h1>Ikhtisar</h1>
				</div>
				<div><img itemprop="logo" src="<?php echo get_template_directory_uri();?>/templates-documentation/assets/img/wordpress.png"></div>
				<h3>Wordpress (<em>CMS</em>)</h3>
				<p>WordPress adalah sebuah aplikasi sumber terbuka (<em>open source</em>) yang sangat populer digunakan sebagai mesin blog (<em>blog engine</em>) maupun website. WordPress dibangun dengan bahasa pemrograman PHP dan basis data (<em>database</em>) MySQL. PHP dan MySQL, keduanya merupakan perangkat lunak sumber terbuka (<em>open source software</em>). Selain sebagai blog, WordPress juga mulai digunakan sebagai sebuah CMS (<em>Content Management System</em>) karena kemampuannya untuk dimodifikasi dan disesuaikan dengan kebutuhan penggunanya. WordPress adalah penerus resmi dari b2/cafelog yang dikembangkan oleh Michel Valdrighi. Nama WordPress diusulkan oleh Christine Selleck, teman Matt Mullenweg. WordPress saat ini menjadi platform content management system (<em>CMS</em>) bagi beberapa situs web ternama seperti CNN, Reuters, The New York Times, TechCrunch, dan lainnya. Untuk detailnya anda bisa melihat secara detail tentang wordpress di <a href="http://id.wikipedia.org/wiki/WordPress" target="_blank">wikipedia.</a>
				</p>

				<p>WordPress.com merupakan situs layanan blog yang menggunakan mesin WordPress, didirikan oleh perusahaan <a href="http://id.wikipedia.org/wiki/Automattic" target="_blank">Automattic</a>. Di dalam CMS ini fitur yang disediakan oleh WordPress sudah cukup bagus. <a href="http://www.Wordpress.org" target="_blank">WordPress.org</a> merupakan wilayah pengembang (<em>developer</em>). Di alamat ini, seseorang dapat mengunduh (<em>download</em>) aplikasi beserta seluruh berkas CMS WordPress. Selanjutnya, CMS ini dapat diubah ulang selama seseorang menguasai PHP, CSS dan skrip lain yang menyertainya. Layanan yang kami sediakan menggunakan Platform CMS WordPress dengan fitur utuh bawaan dari WordPress itu sendiri, bukan bersifat multisite (<em>satu core site clonning beberapa site</em>) yang biasayan kita jumpai pada layanan gratis pembuatan blog di <a href="http://www.wordpress.com" target="_blank">WordPress.com</a>.</p>

			</section>

			<section id="fitur-fungsi">
				<div class="page-header">
					<h1>Fitur WordPress (<em>CMS</em>)</h1>
				</div>
				<div><img itemprop="logo" src="<?php echo get_template_directory_uri();?>/templates-documentation/assets/img/wordpress-code.png"></div>
				<h3>Keunggulan dan Fitur WordPress</h3>
				<p>Adapun keunggualan dari menggunakan Wordpress ini sebagai platform pembuatan website secara cepat dan praktis.
				</p>

				<ol>
				<li>Gratis. Untuk mendapatkan perangkat lunak WordPress hanya perlu mengunduh dari situsnya tanpa dipungut biaya, bahkan untuk blog komersial sekalipun.</li>
				<li>Berbasis kode sumber terbuka (<em>open source</em>).</li>
				<li>Templat atau desain tampilannya mudah dimodifikasi sesuai keinginan pengguna.</li>
				<li>Pengoperasiannya mudah.</li>
				<li>Satu blog WordPress, dapat digunakan untuk banyak pengguna (<em>multi user</em>). Sehingga WordPress juga sering digunakan untuk blog komunitas. Anggota komunitas tersebut dapat berperan sebagai kontributor.</li>
				<li>Komunitas Pendukung (<em>community support</em>) WordPress sudah tersebar dan banyak didunia.</li>
				<li>Supporting Plugin/ Addon/ Modul yang langsung terhubung dengan pengembang WordPress.</li>
				<li>Fasilitas Trackback dan Pingback. Juga memiliki kemampuan untuk melakukan otomatis Ping (<em>RPC Ping</em>) ke berbagai search engine dan web directory, sehingga website yang dibuat dengan Wordpress akan lebih cepat ter index pada search engine.</li>
				<li>Mempunyai kemampuan optimalisasi yang baik pada Mesin Pencari (<em>Search Engine Optimizer</em>).</li>
				</ol>

			</section>

			<section id="desain-interface">
				<div class="page-header">
					<h1>Desain Interface (<em>Themes</em>)</h1>
				</div>
				<div><img itemprop="logo" src="<?php echo get_template_directory_uri();?>/templates-documentation/assets/img/themes.png"></div>
				<h3>Deskripsi dan Fungsi</h3>
				<p>Themes/ Tema pada website menggunakan platform CMS WordPress merupakan interface dari website yang dibangun. Dan themes tersebut membawa fungsi website sesuai yang diinginkan, seperti salah satu contoh pembangunan website profile perusahaan maupun Magazine/ News. Pada setiap themes didesain oleh programming untuk sedemikian rupa mengikuti alur pengembangan pada struktur program WordPress. Fungsi dan fitur pada website memungkinkan untuk ditambahkan/ oleh fungsi plugin didalamnya. Compatible pada versi platform dan plugin merupakan hal penting untuk dijadikan acuan dalam proses pengembangan sebuah themes yang mengikuti perkembangan platform CMS yang sedang digunakan.</p>
				<p>Dalam proses pembuatan themes ada beberapa hal yang perlu dikuasai secara teknis dan keahlianya, tidak hanya pada sisi desain saja yang menggunakan program Pothosop atau program yang lainnya untuk mendesain, akan tetapi tahap berikutnya adalah mengconversi hasil daripada desain tersebut kedalam sebuah script, setidaknya seperti yang dijelaskan sebelumnya yaitu seseorang tersebut harus menguasai PHP, CSS dan skrip lain yang menyertainya. Untuk mempermudah hal tersebut dari Wordpress sendiri juga telah menyediakan themes yang secara free (<em>gratis</em>) dan bisa di unduh pada alamat <a href="http://www.wordpress.org/themes/‎" target="_blank">WordPres.org</a>. Bagi para pengembangan juga disiapkan dokumentasi yang berisi tentang tatacara dan petunjuk dasar-dasar pemograman untuk proses pembuatan themes dan plugin WordPress di <a href="http://www.codex.wordpress.org‎" target="_blank">codex.wordpress.org</a></p>

			</section>
	
			<section id="pengaturan-themes">
				<div class="page-header">
					<h1>Pengaturan & Install Themes</h1>
				</div>
				<div><img itemprop="logo" src="<?php echo get_template_directory_uri();?>/templates-documentation/assets/img/themes-wp.png"></div>
				<h3>Upload dan Install</h3>
				<p>Untuk proses installasi themes yang akan menjadi interface website, terlebih dahulu file theme tersebut harus tercomppress dengan extensi ZIP. Perlu diketahui file compress ZIP tersebut harus berisi serangkaian file themes standart sesuai dengan struktur themes yang ditetapkan oleh WordPress, bila hal tersebut tidak sesuai maka installasi themes bisa mengalami kegagalan.</p>
				<p>Apabila semua sudah sesuai dan siap untuk diupload, maka terlebih dahulu harus login dan masuk pada Dashboard backend website. Masuk pada menu "Apparearance" dan pilih Themes, tekan tombol Add New Theme untuk memulai proses upload Themes. Dalam proses ini membutuhkan beberapa waktu hingga sampai selesai proses uploadnya,apabila sukses akan menjumpai pemberitahuan/ notification langsung untuk menyarankan apakah diaktifkan sekarang atau kembali ke menu themes.
				</p>

			</section>

			<section id="modul-plugin-addons">
				<div class="page-header">
					<h1>Plugin WordPress</h1>
				</div>
				<div><img itemprop="logo" src="<?php echo get_template_directory_uri();?>/templates-documentation/assets/img/plugin.jpg"></div>
				<h3>Deskripsi dan Fungsi</h3>
				<p>Selain fungsi dan fitur  dasar yang di dapat dari bawaan CMS, WordPress juga mempunyai sebuah fitur yang bernama Plugin yang berfungsi untuk customize/ keleluasaan untuk menambahkan sebuah fungsi sistem baru pada website sesuai dengan apa yang diinginkan. WordPress pada backend Dashboardnya juga memungkinkan untuk terhubung dengan repository para pengembang WordPress.</p>
				<p>Ada beberapa hal yang diketahui dan tips untuk kinerja daripada website, yaitu disarankan untuk pengguna website dengan platform CMS WordPress tidak dianjurkan untuk menginstall/ mengaktifkan plugin terlalu banyak, karena dengan banyaknya plugin yang terinstall dan aktive menyebabkan proses kinerja website menjadi lambat yang terkadang juga mengalami down. Dari sisi fungsi dan keberadaan plugin memang memudahkan user dengan mudah menambahkan fitur/fungsi sistem pada website sesuai dengan keinginan, namun ketika tidak sesuai dan terlalu banyak justru akan menyebabkan sebaliknya.
				</p>

			</section>

			<section id="widget">
				<div class="page-header">
					<h1>Pengaturan Widget</h1>
				</div>
				<div><img itemprop="logo" src="<?php echo get_template_directory_uri();?>/templates-documentation/assets/img/widget.jpg"></div>
				<h3>Deskripsi dan Fungsi</h3>
				<p>Widget merupakan salah satu dari serangkaian fitur yang terdapat pada CMS WordPress yang berfungsi sebagai pengaplikasian dan penataan fungsi pada layout website. Yang biasaya setelah plugin tertentu ditambahkan dan diaktifkan, ada beberapa fitur plugin tersebut perlu penataan selanjutnya yaitu menampilkan fitur plugin tersebut pada frontend website. Fungsi widget itulah yang akan mengaplikasikan fitur plugin tersebut dan menata tata letak dari bawaan plugin yang terinstall. Pada umumnya tampilan widget ini akan terlihat pada sisi desain sebelah kiri kanan (<em>Sidebar</em>) dan footer/ kolom paling bawah  interface website.
				</p>

			</section>

			<section id="navigasi">
				<div class="page-header">
					<h1>Menu Navigations</h1>
				</div>
				<div><img itemprop="logo" src="<?php echo get_template_directory_uri();?>/templates-documentation/assets/img/menu.png"></div>
				<h3>Pengaturan dan Pembuatan Menu</h3>
				<p>Setiap bagian desain interface website mempunyai managament sendiri-sendiri dalam pengelolaan dan pengaturannya untuk menampilkan menu pokok (<em>main menu</em>) pada frontend hingga menu pada kolom baris paling bawah (<em>footer</em>).</p>
				<p>Seperti contoh pada gambar diatas, merupakan contoh tampilan untuk management manu, secara teknis hanya tinggal pengaturan sesuai dengan yang diinginkan. Dengan menggeser pilihan yang ada samping kanan untuk di drag kearah menu yang dipilih. Pilihan menu bisa berupa page, post, category, tags,link, dan lainnya.
				</p>

			</section>

			<section id="post-pages">
				<div class="page-header">
					<h1>Posts dan Pages Content</h1>
				</div>
				<div><img itemprop="logo" src="<?php echo get_template_directory_uri();?>/templates-documentation/assets/img/page_post.png"></div>
				<h3>Deskripsi dan Fungsi</h3>
				<h4>Posts</h4>
				<p>Dalam sistem CMS (<em>Content Management System</em>) WordPress ini memungkinkan untuk membuat serangkaian data tulisan secara dinamis dan terjadwal. Dengan dukungan fitur Menu Posts pada backend terdapat form untuk input secara mudah sebuah tulisan maupun berupa gambar. Administrator, contributor, editor, dan author mempunyai hak untuk mengirim dan input tulisan ke menu ini.</p>
				<p>Fungsi daripada adanya menu posts ini, memungkinkan bagi user pengelola untuk setiap saat menulis dan menerbitkan tulisan dengan cara mengetik langsung maupun copy paste tulisan atau isi kedalam form. Sekaligus dalam menu posts ini meliputi category di dalamnya untuk mengelompokkan tema daripada tulisan tersebut. Untuk pembuatan categorypun sangat mudah bisa langsung pada menu posts maupun pada menu category secara terpisah. Pada umumnya ketika mengupdate/ menerbitkan tulisan pada sebuah blog, user tinggal menambahkan postingan pada menu post tersebut, karena fungsi pada blog mengambil semua tulisa yang ada pada posts tersebut.
				</p>
				<h4>Pages</h4>
				<p>Tidak berbeda dengan Posts, secara garis besar pages/ halaman ini juga berisi serangkaian tulisan dan gambar. Perbedaan hanya pada sisi fungsi dasar halaman dan kegunaannya saja. Untuk pages/ halaman bisa diartikan merupakan tulisan yang bersifat statis berbeda dengan post yang bersifat dinamis dalam kontek update sebuah isi website. Pages memungkinkan untuk diatur sedemikian rupa mengikuti desain sesuai dengan keinginan yang mengitkuti settingan template pada script fungsi themes yang dibawa, sedangkan post dalam sisi tampilan layout mempunyai satu tampilan saja sebagai default/dasar desain pada themes.</p>
				<p>Pada form pages/ halaman terdapat pilihan untuk disetting sebagai halaman pertama maupun halaman khusus, seperti gallery, portfolio, contact, dan lainnya. Kemungkinan sebuah halaman berubah desain dan isi sangatlah kecil, maka dari itu pages/halaman ini kecenderungan dikatakan statis untuk update isinya. Hanya sekumpulan isi informasi yang tidak mengalami banyak perubahan secara berskala pendek.
				</p>

			</section>

			<section id="media-object">
				<div class="page-header">
					<h1>Media Object</h1>
				</div>
				<div><img itemprop="logo" src="<?php echo get_template_directory_uri();?>/templates-documentation/assets/img/media.png"></div>
				<h3>Deskripsi dan Fungsi</h3>
				<p>Media Object merupakan fitur untuk mengatur sirkulasi data yang bersifat "static data" dianataranya berupa file gambar (<em>jpg,png,jepg,gif</em>) dan file lainya. Semua file yang berkaitan dengan media akan terdata pada fitur/ menu media object ini, sekalipun itu bergandengan dengan sebuah tulisan dan halaman. Dengan menu yang di dapat media object ini setiap administrator/ penulis sebagai pengelola website, memungkinkan untuk menambahkan, mengedit,hingga sampai menghapus isi dari pada media object tersebut.</p>
				<p>Dengan fasilitas menu media object ini, pihak pengelola website bisa mefungsikan fasilitas ini menjadi media peyimpanan file static apapun. Karena fitur ini dilengkapi dengan deteksi alamat lokasi file berbentuk url, memungkinkan untuk di unduh lewat alamat tersebut, dan alamat tersebut bersifat private (<em>hanya pemilik yang mengetahui alamat tersebut</em>).
				</p>

			</section>

			<section id="eksport-import">
				<div class="page-header">
					<h1>Export & Import</h1>
				</div>
				<div><img itemprop="logo" src="<?php echo get_template_directory_uri();?>/templates-documentation/assets/img/export-import.png"></div>
				<h3>Migrasi dan Backup</h3>
				<p>Seperti yang sudah diketahui selain WordPress banyak CMS (<em>Content Management System</em>) lain yang juga menjadi platform untuk proses pembuatan website. Di dalam CMS WordPress sendiri terdapat fitur/ fasilitas menu Eksport dan Import sebuah data yang berada pada website. Ketika seseorang berpindah dari CMS ke CMS WordPress, banyak hal yang dapat dilakukan, salah satunya dengan import data yang sudah ada dari CMS sebelumnya. Export dan Import merupakan salah satu fitur yang terdapat di CMS WordPress pada menu Tools, yang memungkinkan seseorang melakukan backup data tulisan dengan cara export berikut dengan input data yang sudah ada dengan cara import.</p>
				<p>Tools ini memungkinkan untuk input data dari Blogger, Blogroll, Livejournal, Movable Type and TypePad, RSS, Tumblr. Sekaligus dapat menggunakan pilihan Export data untuk proses backup tulisan dan halaman serta settingan pada WordPress yang sudah ada. Untuk mengaktifkan fitur ini memerlukan dukungan sebuah plugin untuk menjalankannya dan bisa diunduh secara gratis pada halaman <a href="http://wordpress.org/plugins/wordpress-importer/" target="_blank">WordPress.org</a>
				</p>

			</section>

			<section id="general-setting">
				<div class="page-header">
					<h1>Settings</h1>
				</div>
				<div><img itemprop="logo" src="<?php echo get_template_directory_uri();?>/templates-documentation/assets/img/settings.png"></div>
				<h3>Pengaturan Stadart Website</h3>
				<p>Pengaturan dasar pada website dengan menggunakan CMS WordPress merupakan langkah utama yang harus dilakukan sebelum dipublikasikan dan diakses oleh para pengunjung. Pada Menu terakhir didalam backend Dashboard terdapat menu Settings yang meliputi beberapa submenu didalamnya, diataranya General, Writing, Reading, Discussion, Media, dan Permalinks.
				</p>
				<h4>General</h4>
				<p>Didalam menu ini ada beberapa pengaturan dan pilihan yang perlu diisi oleh pemilik website, diantaranya:</p>
				<ul>
				<li>Site Title: Judul daripada website maupun nama website.</li>
				<li>Tagline: Kata Kunci dari website ketika seseorang melakukan browseng.</li>
				<li>WordPress Address (URL) & Site Address (URL): Secara otomatis sudah tersetting tidak perlu dirubah.</li>
				<li>E-mail Address: Merupakan email dasar daripada website, berguna sebagai alamat pengiriman segala bentuk perubahan pada website tersebut.</li>
				<li>Membership: Pilihan untuk memberikan akses ke publik user sebagai subscribe/ pelanggan atau sesuai dengan settingan yang diinginkan.</li>
				<li>New User Default Role: Digunakan untuk menentukan posisi/ hak akses ketika mendaftar pada website. (<em>Subscriber merupakan settingan default</em>).</li>
				<li>Timezone, Date Format, Time Format: Untuk mengatur tampilan waktu sesuai dengan area negara atau sesuai dengan yang diinginkan.</li>

			</section>

	</div>
</div>

</div>

<?php endwhile; ?>
<?php get_footer(); ?>
