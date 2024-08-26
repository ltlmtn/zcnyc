<div class="programs-filter">
    <div class="label">Filter by location:</div>
    <ul>
        <li id="zcnyc" class="active"><button>ZCNYC</button></li>
        <li id="online"><button>Online</button></li>
        <li id="zmm"><button>Zen Mountain Monastery</button></li>
    </ul>
</div>
<div class="programs-link">
    <a class="button reversed" href="/programs">View All Programs</a>
</div>

<script>

    document.addEventListener('DOMContentLoaded', function() {
        var lis = document.querySelectorAll('.programs-filter li');
        var body = document.querySelector('body');

        lis.forEach(function(li) {
            li.addEventListener('click', function() {
                // Remove "active" class from all lis
                lis.forEach(function(item) {
                    item.classList.remove('active');
                });

                // Add "active" class to the clicked li
                li.classList.add('active');

                // Add corresponding class to body classlist
                var id = li.getAttribute('id');
                body.classList.remove('zcnyc', 'online', 'zmm');
                body.classList.add(id);
            });
        });
    });

    // Add "zcnyc" to body classlist on initial page load
    body.classList.add('zcnyc');


    // Add "single-program" class if this is a single program page
    document.addEventListener('DOMContentLoaded', function() {
        var singleProgram = document.querySelector('.single-program');
        if (singleProgram) {
            document.body.classList.add('single-program');
        }
    });
</script>