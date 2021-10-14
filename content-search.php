<!DOCTYPE html>
<html lang="en">
<?php



?>
<style>
table.emptyGrid {
    width: 65vw;
}

td.gridSize {
    border-width: 0.65rem;
    border-radius: 2.25rem;
    border-style: solid;
    height: 5rem;
    opacity 1;
    animation: pulse 1s ease forwards;
}

td.emptyGrid1 {
    border-color: #ffffff45;
    background: #ffffff15;
    animation-delay: 0s;
    animation-iteration-count: infinite;
}
td.emptyGrid12 {
    border-color: #ffffff37;
    background: #ffffff13;
    animation-delay: 0.2s;
    animation-iteration-count: infinite;
}
td.emptyGrid13 {
    border-color: #ffffff30;
    background: #ffffff11;
    animation-delay: 0.4s;
    animation-iteration-count: infinite;
}
td.emptyGrid2 {
    border-color: #ffffff18;
    background: #ffffff09;
    animation-delay: 0.2s;
    animation-iteration-count: infinite;
}
td.emptyGrid22 {
    border-color: #ffffff15;
    background: #ffffff08;
    animation-delay: 0.4s;
    animation-iteration-count: infinite;
}
td.emptyGrid23 {
    border-color: #ffffff12;
    background: #ffffff07;
    animation-delay: 0.6s;
    animation-iteration-count: infinite;
}
td.emptyGrid3 {
    border-color: #ffffff08;
    background: #ffffff07;
    animation-delay: 0.4s;
    animation-iteration-count: infinite;
}
td.emptyGrid32 {
    border-color: #ffffff06;
    background: #ffffff05;
    animation-delay: 0.6s;
    animation-iteration-count: infinite;
}
td.emptyGrid33 {
    border-color: #ffffff03;
    background: #ffffff03;
    animation-delay: 0.8s;
    animation-iteration-count: infinite;
}

@keyframes pulse {
    from {
        opacity: 1;
    }

    50% {
        opacity: 0.65;
    }

    to {
        opacity: 1;
    }
}
</style>
<body>
    <div class="col-12" style="font-size: 22.5px; padding-left: 10ch">
        <div class="col-12" style="margin-top: 5vh">
            <div class="col-10 push-1 titleBold" style="">
                <form method="post">
                    <div class="col-10">
                        <input maxlength="280" type="text" name="search_msg" placeholder="Search for Users..." value="" style="width: 65vw; background-color: #212121; border-color: #212121; border-style: solid; color: #fff; padding: 1vh 1vw; border-radius: 0.75ch; font-size: 20px; word-break: break-word; vertical-align: top;" required />
                    </div>
                </form>
            </div>
        </div>
        <div class="col-12" style="margin-top: 5vh">
            <div class="col-10 push-1 subtitleLight" style="font-size: 22.5px">
                Results
            </div>
        </div>
        <div class="col-12" style="margin-top: 1vh">
            <table class="col-10 push-1 emptyGrid" cellspacing="15" cellpadding="0">
                <tbody style="width: 100%">
                    <tr style="width: 100%">
                        <td class="gridSize emptyGrid1"></td>
                    </tr>
                    <tr class="emptyGrid2">
                        <td class="gridSize emptyGrid12"></td>
                    </tr>
                    <tr class="emptyGrid3">
                        <td class="gridSize emptyGrid2"></td>
                    </tr>
                    <tr style="width: 100%">
                        <td class="gridSize emptyGrid22"></td>
                    </tr>
                    <tr class="emptyGrid2">
                        <td class="gridSize emptyGrid3"></td>
                    </tr>
                    <tr class="emptyGrid3">
                        <td class="gridSize emptyGrid32"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>