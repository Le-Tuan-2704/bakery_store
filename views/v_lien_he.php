<div class=" container-lien-he">
    <div>
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-4G2GnW77E4xFlWjZk28h6uuZasVCXSc&callback=initMap" type="text/javascript"></script>
        <style type="text/css">
            /* Always set the map height explicitly to define the size of the div
      * element that contains the map. */
            #map {
                width: 300px;
                height: 400px;
                margin-right: 50px;
            }

            /* Optional: Makes the sample page fill the window. */
            html,
            body {
                height: 100%;
                margin: 0;
                padding: 0;
            }
        </style>

        <script>
            let map;

            function initMap() {
                map = new google.maps.Map(document.getElementById("map"), {
                    center: {
                        lat: 21,
                        lng: 105.843
                    },
                    zoom: 15,
                });
            }
        </script>

        <div id="map"></div>
    </div>

    <div class>
        <div class="container-last-head">
            <h4>We Thought of you</h4>
            <p>
                Capitalize on low hanging fruit to identify a ballpark
                value added activity to beta test. Override the digital
                divide with additional clickthroughs from DevOps.
                Nanotechnology immersion along the information highway
                will close the loop on focusing solely on the bottom line.
            </p>
            <span>Le Tuan</span><br>
        </div>
        <div class="text-lien-he">
            <div class="img-lien-he">
                <img src="public/images/tieu_de.jpg" alt="">
            </div>
            <div>
                <h4>Địa chỉ :</h4>
                <p>Tiệm bánh Chanh ngọt<br><span>số 1 Giải Phóng, Bạch Mai, Hà Nội</span></p>
                <h4>Điện thoại :</h4>
                <p>0962 803 621 | 1982 562 123</p>
                <h4>Email :</h4>
                <p>abc@gmail.com</p>
            </div>

        </div>
    </div>


</div>

<style>
    .container-lien-he {
        margin-top: 100px;
        display: flex;
        justify-content: end;

    }
    .container-last-head{
        margin-bottom: 50px;
        text-align: center;
    }
    .container-last-head h4{
        font-weight: 600;
        margin-bottom: 10px;
    }
    .container-last-head p{
        font-size: 16px;
        color: #9e9e9e;
        margin-bottom: 10px;
    }
    .container-last-head span{
        font-weight: 500;
        color: #888888;
    }
    .text-lien-he{
        display: flex;
        justify-content: space-around;
    }
    .text-lien-he h2 {
        margin-top: 30px;
        font-weight: 600;
    }

    .text-lien-he p {
        margin-top: 10px;
        margin-bottom: 20px;
        font-size: 16px;
        color: #9e9e9e;
    }

    .img-lien-he img {
        width: 300px;
    }
</style>