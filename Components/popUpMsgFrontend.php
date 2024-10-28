<style>
    #popUpMsg {
        position: fixed;
        margin: 0.5rem;
        top: 18%;
        right: 0;
        width: 30vw;
        min-width: 360px;
        font-weight: 700;
        font-size: 0.7rem;
        z-index: 3;
    }
</style>


<div class="alert alert-warning alert-dismissible fade" id="popUpMsg" role="alert">
    <span id="popUpMsgIcon"> <i class="fa-solid fa-triangle-exclamation me-2"></i> </span>
    <span id="popUpMsgTxt"></span>
    <button type="button" class="btn-close" id="closePopUp"></button>
</div>