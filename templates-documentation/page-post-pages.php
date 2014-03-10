<?php
/**
 * Template Name: Documentation - Pengoperasian Web
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
			Dokumentasi dan petunjuk untuk pengelolaan, pengoperasian dasar website dengan platform CMS (Content Management System) WordPress.
		</p>
	</div>
</header>

<div class="container">

	<div class="row">

		<div class="span3 bs-docs-sidebar">
			<ul class="nav nav-list bs-docs-sidenav">
				<li>
					<a href="#menerbitkan-tulisan"> <i class="icon-chevron-right"></i>
						Menerbitkan Tulisan
					</a>
				</li>
				<li>
					<a href="#membuat-halaman">
						<i class="icon-chevron-right"></i>
						Membuat Halaman
					</a>
				</li>
				<li>
					<a href="#manage-user">
						<i class="icon-chevron-right"></i>
						Mengelola User
					</a>
				</li>

			</ul>
		</div>

		<div class="span9">

			<section id="menerbitkan-tulisan">
				<div><img itemprop="logo" src="<?php echo get_template_directory_uri();?>/templates-documentation/assets/img/page_post.png"></div>
				<div class="page-header">
					<h1>How to Add Posts</h1>
				</div>
				<h3>All Posts</h3>
				<div><img itemprop="logo" src="<?php echo get_template_directory_uri();?>/templates-documentation/assets/img/posts.jpg"></div>
				<p>Pada menu ini terdapat beberapa fungsi yang ada didalamnya untuk manegement semua Post yang sudah diterbitkan atau belum. Disini juga memungkinkan seseorang edit secara cepat dan praktis tanpa harus masuk ada menu Post pada tulisan. Seseorang juga bisa mengatur secara cepat untuk setting post:</p>
				<ul>
				<li>Mengedit Title/ Judul pada tulisan dan Slug atau URL</li>
				<li>Pengelompokkan tulisa pada categori</li>
				<li>Menuliskan tags secara cepat</li>
				<li>Mengubah jadwal terbit</li>
				<li>Memberikan password pada tulisan atau private post</li>
				<li>Setting tulisan untuk publish,pending, maupun dalam bentuk draft</li>
				</ul>
				<h3>Add New</h3>
				<div><img itemprop="logo" src="<?php echo get_template_directory_uri();?>/templates-documentation/assets/img/add-new-post.jpg"></div>
				<p>Pada menu ini terdapat sebuah form untuk memulai posting sebuah tulisan maupun gambar. Didalamnya ada beberapa fungsi kolom yang disediakan untuk mempermudah dalam pengelolaan dan menata tulisan yang akan diterbitkan. Beberapa bagian fungsi yang terdapat dalam menu ini untuk memulai pengelolaan, antara lain yaitu:</p>
				<ul>
				<li>Form untuk Title/ Judul tulisan</li>
				<li>Form untuk memasukkan/ menuliskan tulisan, dan beberapa komponen tool untuk mengatur penataan tulisan. Seperti meratakan tulisan kesisi kanan,kiri,tengah, membuat font besar kecilnya, membuat link pada tulisan, membuat font tebal, miringnya, membuat warna font, membuat baris angka dan menyisipkan sebuah gambar pada tulisan. Form ini memungkin input tulisan dengan 2 (<em>dua</em>), dengan cara visual (<em>praktis</em> dan dengan cara input tulisan dalam format HTML</li>
				<li>Save Daft dan Preview, menyimpan dalam bentuk draft dan melihat pra tulisan sebelum diterbitkan</li>
				<li>Mengubah jadwal terbit pada tulisan</li>
				<li>Pengelompokkan tulisan pada Categories</li>
				<li>Memasukkan barisan Tags pada tulisan yang akan diterbitkan. Note:<em> Tulisan yang dimasukkan pada Tags disarankan sangat unix sebagai kata kunci tulisa atau website itu sendiri, karena dari tags inilah yang akan di index oleh Google dalam system searchingnya</em></li>
				<li>Featured Image digunakan untuk mengupload sebuah gambar pada tulisan yang akan diterbitkan sebagai ilustrasi pada tulisan. Ini sangat disarankan untuk membuat layout tampilan tulisan yang diterbitkan sesuai dengan desain interface/ themes pada website</li>
				<li>Discussion merupakan pilihan untuk memperbolehkan pembaca/ pengujung untuk berkomentar pada tulisan yang diterbitkan</li>
				<li>Mengatur penulis pada tulisan yang diterbitkan. Dalam hal ini administrator mempunyai otoritas penuh dalam merubah pilihan author/ penulis sesuai dengan keinginannya</li>
				</ul>
				<h3>Categories</h3>
				<div><img itemprop="logo" src="<?php echo get_template_directory_uri();?>/templates-documentation/assets/img/categories-post.jpg"></div>
				<p>Menu ini digunakan untuk membuat serangkaian Categories pada tulisan yang akan diterbitkan sekaligus memanagement semua Categories yang ada. Berapa pilihan yang terdapat dalam menu ini diantaranya:</p>
				<ul>
				<li>Nama Categories</li>
				<li>Slug/ Alamat Url</li>
				<li>Paren: Pembuatan struktur Categories</li>
				<li>Deskripsi Categories</li>
				<li>Kolom managament Categories. Dari sini kita bisa melihat seberapa banyak tulisan/ Post yang dikelompokkan pada tiap Categories yang ada</li>
				<li>Pada Kolom ini juga memungkinkan untuk menghapus, edit, melihat sebuah Categories yang ada</li>
				</ul>

				<h3>Tags</h3>
				<div><img itemprop="logo" src="<?php echo get_template_directory_uri();?>/templates-documentation/assets/img/tags-post.jpg"></div>
				<p>Tidak jauh berbeda dengan Categories, tampilan pada menu Tags ini juga terdapat serangkaian form dan kolok untuk management Tags yang ada. Satu yang perlu diperhatikan perbedaan dari kesemuanya, Tags ini mempunyai peran penting dalam index mesin searching google. Disarankan dalam pembuatan Tags menggunakan kata yang unix sebagai kata kunci utama dari kesemuannya baik tulisan, halaman maupun pada website itu sendiri. Gunakan fungsi Tags ini dengan sesering mungkin pada tiap-tiap tulisan yang diterbitkan, semakin banyak dan unix akan menentukan index range pada searching google.</p>

			</section>

			<section id="membuat-halaman">
				<div class="page-header">
					<h1>How Add Pages</h1>
				</div>
				<div><img itemprop="logo" src="<?php echo get_template_directory_uri();?>/templates-documentation/assets/img/add-pages.jpg"></div>
				<h3>All Pages</h3>
				<p>Tampilan dan beberapa fungsi didalamnya hampir tidak berbeda dengan fitur yang terdapat All Posts. Hanya saja untuk menu di All page ini menyesuaikan dengan fungsi pages/ halaman. Diantaranya meliputi beberapa pengaturan yaitu:</p>
				<ul>
				<li>Form untuk Title/ Judul tulisan pada halaman</li>
				<li>Pengaturan Slug/ URL halaman</li>
				<li>Pengaturan Private atau Password</li>
				<li>Mengubah jadwal terbit pada tulisan</li>
				<li>Parent untuk mengubah Struktur posisi halaman</li>
				<li>Pemilihan Template pada halaman yang diinginkan</li>
				<li>Memberikan Akses untuk pembaca umum memberi komentar pada halaman</li>
				<li>Pengaturan untuk diterbitkan atau masuk dalam draft</li>
				</ul>

				<h3>Add New</h3>
				<p>Menu ini digunakan untuk memulai dalam proses pembuatan halaman baru sepeti pada Add Post dan beberapa perbedaan pada fungsi menu yang didapat pada All Pages diantaranya tidak terdapat fasilitas untuk:</p>
				<ul>
				<li>Mengedit isi tulisan secara detail</li>
				<li>Mengatur gambar pada tulisan yang terdapat pada halaman</li>
				</ul>

			</section>

			<section id="manage-user">
				<div class="page-header">
					<h1>Manage & Add User Roles</h1>
				</div>
				<div><img itemprop="logo" src="<?php echo get_template_directory_uri();?>/templates-documentation/assets/img/all-users.jpg"></div>
				<h3>All Users</h3>
				<p>Menu ini menampilkan semua user yang ada pada pada website berikut dengan pengeditan cepat. Pada struktur management user terdapat beberapa setting/ aturan untuk posisi hak akses pada tiap-tiap user dalam klasifikasi yang spesifik diantaranya:</p>
				<ul>
				<li>Administrator: Mempunyai hak untuk mengelola penuh isi dari pada website</li>
				<li>Author: User mempunyai akses hanya bisa mengirimkan/ menerbitkan tulisan, dan tidak bisa merubah tulisan dari author/ penulis lainnya</li>
				<li>Contributor: Mempunyai akses untuk mengirimkan/ menerbitkan berita seperti halnya fungsi yang didapat dari Author</li>
				<li>Editor: Hak akses yang dimiliki lebih banyak dari keduanya, yaitu bisa merubah isi dari pada berita pada tiap-tiap Author sekaligus menerbitkannya</li>
				<li>Subscriber: Yaitu pilihan user secara default ketika website hanya dikelola untuk kalangan sendiri, subscriber ini berarti user pelanggan dari isi berita/ tulisan yang diterbitkan oleh website. Hak akses yang diberikan hanya sebagai pembaca baik lewat website secara langsung maupun update berita dari email pribadinya.</li>
				</ul>

				<h3>Add New Users</h3>
				<div><img itemprop="logo" src="<?php echo get_template_directory_uri();?>/templates-documentation/assets/img/add-user.jpg"></div>
				<p>Biasanya pada website memungkinkan untuk mengatur fungsi pendaftaran member/ user pda frontend tampilan website tersebut. Untuk fitur ini digunakan sebagai alternative dari pihak pengelola website pada saat memanagement seorang user didalamnya untuk memungkinkan menambahkan sendiri user pada website. Pada menu ini beberapa yang harus diisi untuk menambahkan user baru pada website lewat administrator/ pengelola website:</p>
				<ul>
				<li>Nama Username untuk login</li>
				<li>Email Resmi dan Aktif pada user yang ditambahkan</li>
				<li>Nama mulai dari awalan dan akhiran</li>
				<li>Url website pada user yang ditambahkan (<em>di isi bila mempunyai</em>)</li>
				<li>Password User</li>
				<li>Pilihan untuk mengirimkan password yang di isi untuk dikirim pada alamat email yang terdaftar</li>
				<li>Mengaturan Hak Akses pada user</li>
				</ul>

				<h3>Your Profile</h3>
				<div><img itemprop="logo" src="<?php echo get_template_directory_uri();?>/templates-documentation/assets/img/edit-profile.jpg"></div>
				<p>Pilihan menu ini digunakan untuk mengisikan/ mengedit serangkaian informasi terkait dengan data diri User. Ada beberapa yang tidak terdapat form isian pada saat menambahkan sebuah user baru pada website, diantaranya yaitu:</p>
				<ul>
				<li>Pilihan pengaktifan Visual Editor</li>
				<li>Admin Color Scheme</li>
				<li>Keyboard Shortcuts</li>
				<li>Toolbar</em></li>
				<li>Nickname</li>
				<li>Toolbar</li>
				<li>Display name publicly as</li>
				<li>Edit Alamat Email</li>
				<li>Edit Alamat Website</li>
				<li>Memasukkan sekilas tentang Biografi</li>
				<li>Pilihan untuk merubah password yang sudah ada</li>
				</ul>

			</section>

	</div>
</div>

</div>

<?php endwhile; ?>
<?php get_footer(); ?>
