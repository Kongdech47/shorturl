<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShortURL</title>

    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.5/dist/sweetalert2.all.min.js" integrity="sha256-sGjBCiHulRy0hJZNvqUc9GypoF3M1qpR9Pc3fiQHIBw=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/brands.min.css" integrity="sha512-BglNUJaVmT9HacZ2AsbVQxjswBmIf3AJj9hhXr/Yre33qU+A1p8gXUcavzcHYkWf5bIvLMIiEbdMrEVqb5h2Rg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/fontawesome.min.css" integrity="sha512-KVdV5HNnN1f6YOANbRuNxyCnqyPICKUmQusEkyeRg4X0p8K1xCdbHs32aA7pWo6WqMZk0wAzl29cItZh8oBPYQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/regular.min.css" integrity="sha512-op8gZY0YqKAatlnYvmUvSqK4sBJQWYA0APRKExBXaTR1SyHHY/Pw4vtfw+L5VMXbVQb/Xvz4xE5d5U3E0wLz/g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/solid.min.css" integrity="sha512-LUxUs00S05YspUb2HCuUTBqTqbjJm2uNvwRXVTcl/jkr9ygYZptXhfknc52iBnPUNgHHHC9ivU4RV6UFxLxhfg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/svg-with-js.min.css" integrity="sha512-OiNHhQwzS1LlbvAM+EbRs/LeCL5RhAkv2pvr432TxTFGcxNcG6I8VVII7s4dUVwJJG7HtHKvsR7zzD5vuSlAlA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/v4-font-face.min.css" integrity="sha512-RiiIeQoUxWFBj0r8eZ49ooAfgtvwzW2pUMpxsWPYwn7u39JzHYxN8Bmb3AwXjnvjoFf4n4TQNgmB+BLYTZChVw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/v4-shims.min.css" integrity="sha512-UtgpaUQPTevIy6walAy8W82eDxOdZJqKS0w2vf0eTItGubnT6TKkbM1GoNyoNvlM4DKhbl45kOK+Z4EhtuK2RA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/v5-font-face.min.css" integrity="sha512-HoJcK6M3SQctK5xy9FlRUy0X4HsoUY5DZpqK5LuuTVbeJNlH8j3PyfGIs0oHmxzl4+mHfAyWd5w4T7kMO81c9w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     -->

     <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/js/all.min.js" integrity="sha512-Cvxz1E4gCrYKQfz6Ne+VoDiiLrbFBvc6BPh4iyKo2/ICdIodfgc5Q9cBjRivfQNUXBCEnQWcEInSXsvlNHY/ZQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/js/brands.min.js" integrity="sha512-GsDrF9gTMgbGhhsHAKPxb4xyTBlGfZYkaE/HcHLKTVFsn8YcYolN1G20Ah/Y4J47Ow0qad7VuS3TpVdba7SpPA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/js/conflict-detection.min.js" integrity="sha512-wyrFXdo6GfIooWayLbVbvq0BFXnZrakBzU/o5030w+gvrtfUaoYoj8x/8onlhHKyl5ARKcoy2tsnOeaWpAo7mA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/js/fontawesome.min.js" integrity="sha512-cy6kInQVR+bdZEOpaATN8oqOzdelm2KUbEcsNlSofYQcxX8wVno7NTQ6PP0vssTUY7VnNtlwBkDV4rQ7j0/fvw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/js/regular.min.js" integrity="sha512-057HhOVZMtQFQ586SWogWKKfb7A2JK050j/TPJiWp+ngB0lPTOS/4H2OqL3QNQjtAMAGfFQEVWDgC0UFkDgpuw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/js/solid.min.js" integrity="sha512-603172ShPQC31NW0ycqvdSmWNP2KD8p0eiWj5hdu+dLsFUi4r8kMzweq9zwmAEJ+f9Kl21mdcEqvEPVujGip7g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/js/v4-shims.min.js" integrity="sha512-yCXeg9jS4gRiqvx/ySAc7UvlEC4n7r7SKT13Fhje4eZ3mufA4YW1llR5rcX9cC5ZfK0OfxJRCrjwiIvJfeH5Cg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.2/jquery.modal.min.js" integrity="sha512-ztxZscxb55lKL+xmWGZEbBHekIzy+1qYKHGZTWZYH1GUwxy0hiA18lW6ORIMj4DHRgvmP/qGcvqwEyFFV7OYVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

     <script src="https://cdn.jsdelivr.net/npm/sharer.js@latest/sharer.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/css/layout.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 m-auto">
                <label class="form-label mb-0"><h4 class="mb-1"><b>ใส่ URL ที่ต้องการย่อให้สั้นลง</b></h4></label>
                <div class="input-group input-group-lg mb-3">
                    <input type="text" class="form-control" placeholder="" id="input-create_short_url" aria-describedby="btn-create_short_url">
                    <span class="input-group-text" id="btn-create_short_url" role="button"><b>ย่อ</b></span>
                </div>
            </div>
        </div>
        <div class="row mt-4 d-none show-short-url">
            <div class="col-md-8 m-auto text-center">
                <label class="form-label mb-0"><h5 class="mb-1"><b>QR Code</b></h5></label>
                <div class="input-group input-group-sm mb-0 justify-content-center">
                    <img src="" title="QR Code" alt="QR Code" id="qrcode" width="200">
                </div>
                <small>สแกนเพื่อเปิด URL</small>
            </div>
        </div>
        <div class="row d-none show-short-url">
            <div class="col-md-8 m-auto">
                <label class="form-label mb-0"><h6 class="mb-1"><b>URL แบบย่อ</b></h6></label>
                <div class="input-group input-group-sm mb-3">
                    <input type="text" class="form-control" placeholder="" id="input-copy_short_url" aria-describedby="btn-copy_short_url" readonly>
                    <span class="input-group-text" onclick="copyToClipboard('input-copy_short_url')" id="btn-copy_short_url" role="button"><b>คัดลอก</b></span>
                </div>
            </div>
        </div>
        <div class="row d-none show-short-url">
            <div class="col-md-8 m-auto">
                <div class="input-group input-group-sm mb-0 justify-content-center">
                    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group me-2">
                            <a href="" download="QR Code from ShortURL.png" id="download-qrcode">
                                <button type="button" class="btn btn-secondary"><i class="fa-solid fa-download"></i></button>
                            </a>
                        </div>
                        <div class="btn-group me-2" id="share-facebook">
                            <button data-sharer="facebook" data-url="" type="button" class="btn btn-primary"><i class="fa-brands fa-facebook-f"></i></button>
                        </div>
                        <div class="btn-group" id="share-twitter">
                            <button data-sharer="twitter" data-title="" data-url="" type="button" class="btn btn-info"><i class="fa-brands fa-twitter"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-8 m-auto text-center">
                <h6 class="mb-1">
                    <b>
                        เว็บไซต์สำหรับย่อลิงค์ หรือ URL ที่มีขนาดยาว ให้สั้นลงได้อย่างง่ายดาย<br>
                        สามารถแสกน QR Code เพื่อเปิดเข้าหน้าเว็บไซต์ได้
                    </b>
                </h6>
            </div>
        </div>
        <hr>
        <div class="row mt-5">
            <div class="col-md-8 m-auto">
                <label class="form-label mb-0"><h5 class="mb-1"><b>TOP 10 URL ยอดนิยม</b></h4></label>
                <div class="input-group input-group-sm mb-3">
                    <table class="table bg-light w-100" id="data_list_statistics">
                        <thead>
                            <tr>
                                <th scope="col" class="qrcode">#</th>
                                <th scope="col" class="short_url">URL แบบย่อ</th>
                                <th scope="col" class="url">URL เดิม</th>
                                <th scope="col" class="statistics">สถิติ</th>
                            </tr>
                        </thead>
                        <tbody class="text-lowercase">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-8 m-auto">
                <label class="form-label mb-0"><h5 class="mb-1"><b>TOP 10 อัพเดตล่าสุด</b></h4></label>
                <div class="input-group input-group-sm mb-3">
                    <table class="table bg-light w-100" id="data_list_shorturl">
                        <thead>
                            <tr>
                                <th scope="col" class="qrcode">#</th>
                                <th scope="col" class="short_url">URL แบบย่อ</th>
                                <th scope="col" class="url">URL เดิม</th>
                                <th scope="col" class="created_at">เมื่อ</th>
                            </tr>
                        </thead>
                        <tbody class="text-lowercase">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>    
    
    <div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-bolder" id="qrModalLabel">QR Code<p class="m-0 ps-2 float-end"></p></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col text-center">
                            <img src="" width="200" alt="" />
                            <p>สแกนเพื่อเปิด URL</p>
                        </div>
                    </div>
                    <div class="row">
                        <span id="qr_name"><b class="float-start me-2">ชื่อ:</b><p class="text-break"></p></span>
                    </div>
                    <div class="row">
                        <span id="qr_shorturl"><b class="float-start me-2">URL แบบย่อ:</b><p class="text-break"><a href="" target="_blank"></a></p></span>
                    </div>
                    <div class="row">
                        <span id="qr_url"><b class="float-start me-2">URL เดิม:</b><p class="text-break"></p></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    var CSRF_TOKEN = "<?= csrf_token() ?>";

    var listStatistics = '<?= json_encode($listStatistics) ?>';
    listStatistics = JSON.parse(listStatistics);

    var listDataShorturl = '<?= json_encode($listDataShorturl) ?>';
    listDataShorturl = JSON.parse(listDataShorturl);
</script>
<script src="/js/layout.js"></script>
<script src="/js/home.js"></script>