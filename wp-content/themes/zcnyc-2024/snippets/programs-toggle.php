<div class="programs-toggle">
    <button id="zcnyc" class="active program-toggle-button">Show Only ZCNYC Programs</button>
    <button id="all" class="program-toggle-button">Show All MRO Programs</button>
</div>
<div class="programs-link">
    <a class="button reversed" href="/programs">View All Programs</a>
</div>

<style>
    .rs-program:not(.zen-center-of-nyc-fire-lotus-temple) {
    display: none;
    }
    .rs-program.practicing-member,
    .rs-program.student-donations {
    display: none !important;
    }
</style>

<script>
    document.getElementById('zcnyc').addEventListener('click', function() {
        document.getElementById('zcnyc').classList.add('active');
        document.getElementById('all').classList.remove('active');
        var programs = document.getElementsByClassName('rs-program');
        for (var i = 0; i < programs.length; i++) {
            if (!programs[i].classList.contains('zen-center-of-nyc-fire-lotus-temple')) {
                programs[i].style.display = 'none';
            }
        }
    });

    document.getElementById('all').addEventListener('click', function() {
        document.getElementById('all').classList.add('active');
        document.getElementById('zcnyc').classList.remove('active');
        var programs = document.getElementsByClassName('rs-program');
        for (var i = 0; i < programs.length; i++) {
            programs[i].style.display = 'grid';
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        var singleProgram = document.querySelector('.single-program');
        if (singleProgram) {
            document.body.classList.add('single-program');
        }
    });
</script>