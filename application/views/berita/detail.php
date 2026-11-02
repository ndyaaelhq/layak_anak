<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="detail-news">
    <div class="detail-news-container">
        <a href="<?php echo site_url('berita'); ?>" class="back-news">← Kembali ke Berita</a>
        <article class="detail-article">
            <div class="detail-image">
                <?php if (!empty($berita->gambar)): ?><img src="<?php echo base_url('assets/uploads/berita/'.$berita->gambar); ?>" alt="<?php echo htmlspecialchars($berita->judul); ?>"><?php else: ?><span>LAYAK ANAK</span><?php endif; ?>
            </div>
            <div class="detail-content">
                <span class="detail-date"><?php echo tgl_indo($berita->tanggal); ?></span>
                <h1><?php echo htmlspecialchars($berita->judul); ?></h1>
                <div class="detail-text"><p><?php echo nl2br(htmlspecialchars($berita->deskripsi)); ?></p></div>
            </div>
        </article>
    </div>
</section>
