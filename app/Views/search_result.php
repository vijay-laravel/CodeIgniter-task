
<style>
    .image-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        padding: 20px;
    }

    .image-card {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        overflow: hidden;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .image-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.15);
    }

    .image-card img {
        width: 100%;
        height: auto;
        display: block;
    }

    .image-card p {
        padding: 15px;
        margin: 0;
        font-size: 14px;
        color: #333;
        text-align: center;
        background-color: #f9f9f9;
    }
</style>

<div class="image-grid">
    <?php foreach ($images as $image): ?>
        <div class="image-card">
            <img src="<?= esc($image['webformatURL']) ?>" alt="<?= esc($image['tags']) ?>">
            <p><?= esc($image['tags']) ?></p>
        </div>
    <?php endforeach; ?>
</div>
