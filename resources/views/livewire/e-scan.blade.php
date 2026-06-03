<div>
<style>
    #reader {
        border-radius: 15px;
        background: #f8fafc;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    .cam-scan{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 50vh;
    }

    
    #reader button {
        background: #2563eb !important;
        color: white !important;
        border: none !important;
        padding: 12px 18px !important;
        font-size: 14px !important;
        border-radius: 10px !important;
        cursor: pointer !important;
        width: 80% !important;
        margin-top: 10px !important;
        transition: 0.2s !important;
    }
    
    #reader button:hover {
        background: #1d4ed8 !important;
        transform: scale(1.02) !important;
    }

    
    #reader a {
        color: #2563eb !important;
        font-weight: bold !important;
        text-decoration: none !important;
        display: block !important;
        margin-top: 10px !important;
    }

    #reader a:hover {
        text-decoration: underline !important;
    }

    #reader img[alt="Info icon"] {
    display: none !important;
}

    
    .alert-info, .alert-warning {
        background: #fee2e2 !important;
        color: #b91c1c !important;
        padding: 10px !important;
        border-radius: 10px !important;
        text-align: center !important;
        font-size: 13px !important;
        margin-bottom: 10px !important;
    }
</style>

<script src="https://unpkg.com/html5-qrcode"></script>

<div class="cam-scan">
    <div id="reader" style="width: 300px;"></div>
</div>

<script>

    
    
    function onScanSuccess(decodedText, decodedResult) {
        console.log(`Scanned: ${decodedText}`);

        
        window.location.href = decodedText;
    }

    // Start camera
    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", 
        { fps: 10, qrbox: 250 } 
    );

    html5QrcodeScanner.render(onScanSuccess);

    const camBtn = document.querySelector("#reader button");
   
     
</script>

</div>