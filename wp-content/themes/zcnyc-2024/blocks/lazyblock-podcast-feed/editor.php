<?php
    get_header(); 
    $feed_url = $attributes['url'];
    $display_limit = $attributes['limit'];
    if( empty($display_limit) ) {
        $limit = 20;
    } else {
        $limit = $display_limit;
    }
?>

<main class="page-content desktop-width">
    <?php the_content(); ?>
</main>

<div class="podcast-grid desktop-width">

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
        <ol>
            <li><?php echo $itemRSS['title']; ?> &rarr;</li>
        </ol>

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

<?php get_footer(); ?>