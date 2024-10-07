<?php
    $feed_url = $attributes['url'];
    $display_limit = $attributes['limit'];
    if( empty($display_limit) ) {
        $limit = 99999;
    } else {
        $limit = $display_limit;
    }
?>

<div class="podcast-grid">

    <?php
    //https://stackoverflow.com/questions/37776950/rss-xml-show-itunesimage-url-in-php
    $doc = new DOMDocument();
    $doc->load($feed_url);

    $counter = 0;
    foreach ($doc->getElementsByTagName('item') as $node) {
        if ($counter >= $limit ) break;

        $itemRSS = array ( 
            'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
            'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
            'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
            'enclosure' => $node->getElementsByTagName('enclosure')->item(0)->getAttribute('url'),
            'description' => $node->getElementsByTagName('description')->item(0)->nodeValue
        );
        $formattedDate = date('F j, Y', strtotime($itemRSS['date']));

    ?>
        <article>
            <div class="title">
                <a href="<?php echo $itemRSS['link']; ?>" target="_blank" title="View podcast on ZMM.org">
                    <h3><?php echo $itemRSS['title']; ?> &rarr;</h3>
                </a>
            </div>
            <div class="timestamp"><?php echo $formattedDate; ?></div>
            <div class="excerpt"><?php echo $itemRSS['description']; ?></div>
            <div class="audio">
                <audio controls>
                    <source src="<?php echo $itemRSS['enclosure']; ?>" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </div>
        </article>

    <?php 
        $counter++;
    } ?>

</div>

<script>
    document.addEventListener('play', function(e){
        var audios = document.getElementsByTagName('audio');
        for(var i = 0, len = audios.length; i < len;i++){
            if(audios[i] != e.target){
                audios[i].pause();
            }
        }
    }, true);
</script>