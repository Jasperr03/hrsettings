<div class="row h-100 bg-lgrey">
    <div class="col-2 ps-3 pt-3 border-end bg-white">
        <div class="d-flex flex-column flex-shrink-0 bg-white">
            <p class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                <span class="fs-4">HR Settings</span>
            </p>
            <hr>
            <ul id="nav_esyllabus" class="nav nav-pills flex-column mb-auto pe-0 vh-100">
                <li onclick="load_hrsettings_submodule('hrdashboard/hrdashboard_main.php', this)" class="nav-item" id="lihrdashboardmodule"><a class="hrsubmodule active nav-link link-dark">Dashboard</a></li>
                <li onclick="load_hrsettings_submodule('employeereg/employeereg_main.php', this)" class="nav-item"><a class="hrsubmodule nav-link link-dark">Employee Registry</a></li>
                <li onclick="load_hrsettings_submodule('positionlist/positionlist_main.php', this)" class="nav-item"><a class="hrsubmodule nav-link link-dark">Position List</a></li>
                <li onclick="load_hrsettings_submodule('employmentstat/employmentstat_main.php', this)" class="nav-item"><a class="hrsubmodule nav-link link-dark">Employement Status</a></li>
                <li onclick="load_hrsettings_submodule('salarygrade/salarygrade_main.php', this)" class="nav-item"><a class="hrsubmodule nav-link link-dark">Salary Grade</a></li>
                <li onclick="load_hrsettings_submodule('contri_deduct/contri_deduct_main.php',this)" class="nav-item"><a class="hrsubmodule nav-link link-dark">Contribution/Deductions</a></li>
                <li onclick="load_hrsettings_submodule('timesched/timesched_main.php',this)" class="nav-item"><a class="hrsubmodule nav-link link-dark">Time Schedule</a></li>
                <!-- <li onclick="load_hrsettings_submodule('prmsub_other.php',this)" class="nav-item"><a class="hrsubmodule nav-link link-dark">Work Schedule</a></li> -->
            </ul>
        </div>

    </div>
    <div id="divhr_submodulecontent" class="col-xl-10 col-lg-10 px-3 auto-scroll">
        <!-- CONTENT HERE -->
    </div>
</div>
<script>
    $(document).ready(function() {

    });

    function load_hrsettings_submodule(filename, elem) {
        showloadingdiv('#divhr_submodulecontent')
        $('#nav_esyllabus li a').removeClass('active')
        $(elem).find('a').addClass('active')

        $.post("registry/hrsettings/components/" + filename, function(data) {
            $('#divhr_submodulecontent').html(data)
        });
    }
</script>