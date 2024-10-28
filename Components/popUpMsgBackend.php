<style>
    #popUpMsgbackend {
        position: fixed;
        margin: 0.5rem;
        top: 10%;
        right: 0;
        width: 30vw;
        min-width: 360px;
        font-weight: 700;
        font-size: 0.7rem;
        z-index: 3;
    }
</style>


<?php

if (isset($_GET['message']) && isset($_GET['icon'])) {
    $message = $_GET['message'];
    $icon = $_GET['icon'];
    ?>


    <div class="alert alert-warning alert-dismissible fade show" id="popUpMsgbackend" role="alert">
        <span id="popUpMsgIcon" class="me-2"> <?php echo $icon ?> </span>
        <span id="popUpMsgTxt"> <?php echo $message ?> </span>
        <button type="button" class="btn-close" id="closePopUpBack"></button>
    </div>



    <?php
}
?>




<script>
    const closePopUpBack = document.getElementById('closePopUpBack');
    closePopUpBack.addEventListener('click', () => {
        const changeUrl = window.location.href.split('?')[0]
        location.href = changeUrl
    })
</script>