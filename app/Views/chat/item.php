<?php foreach ($pesan as $row) : ?>
    <div class="direct-chat-msg <?= getChat($row->id, $level)->owner ?>">
        <div class="direct-chat-infos clearfix">
            <span class="direct-chat-name <?= getChat($row->id, $level)->side ?>"><?= getChat($row->id, $level)->nama ?></span>
            <span class="direct-chat-timestamp <?= getChat($row->id, $level)->oposite ?>"><?= getChat($row->id, $level)->waktu ?></span>
        </div>

        <img class="direct-chat-img" src="/admin_assets/img/profile.png" alt="message user image">

        <div class="direct-chat-text">
            <?= $row->pesan ?>
        </div>
    </div>
<?php endforeach ?>