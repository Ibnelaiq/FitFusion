<x-app-layout>

    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0"><span class="text-light"> Workout /</span> Add </h5>
        <form method="POST" action="{{ route('workouts.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Name:</label>
                <input type="text" id="name" name="name" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }}" required>
                @if($errors->has('name'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('name') }}</p>
                @endif
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-600">Description:</label>
                <textarea id="description" name="description" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('description') ? 'border-red-500' : 'border-gray-300' }}" required></textarea>
                @if($errors->has('description'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('description') }}</p>
                @endif
            </div>

            <!-- Price -->
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-600">Video URL:</label>
                <input type="text" id="price" name="video_url" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('video_url') ? 'border-red-500' : 'border-gray-300' }}" required>
                @if($errors->has('video_url'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('video_url') }}</p>
                @endif
            </div>



            <!-- Image Upload -->
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-600">Image:</label>
                <input type="file" id="image" name="image_url" class="mt-1 p-2 w-full border rounded-md {{ $errors->has('image_url') ? 'border-red-500' : 'border-gray-300' }}" required>
                @if($errors->has('image_url'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('image_url') }}</p>
                @endif
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-600">Detail Images:</label>
                <input type="file" id="image" name="details_images[]" multiple class="mt-1 p-2 w-full border rounded-md {{ $errors->has('details_images') ? 'border-red-500' : 'border-gray-300' }}" required>
                @if($errors->has('image_url'))
                    <p class="text-red-500 text-sm mt-1">{{ $errors->first('details_images') }}</p>
                @endif
            </div>
            <div class="row">
                <div class="col-3"></div>
                <div class="col-3">
                    <svg class="workout-muscles" id="frontSVG" viewBox="0 0 220 523" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path id="F4" d="M88.8094 93.7248C88.8094 93.7248 56.0579 78.0927 44.7179 104.046C39.933 113.983 42.8039 143.927 42.9513 145.398C43.0242 146.355 52.3729 125.23 60.3964 120.74C61.7946 120.004 60.028 99.4666 88.8094 93.7248Z" fill="white" fill-opacity="0.25"/>
                        <path id="F1" d="M131.721 93.725C131.721 93.725 163.261 77.0313 176.29 104.046C181.075 113.984 177.727 143.927 177.58 145.399C177.506 146.356 168.157 125.23 160.134 120.74C158.736 120.004 160.502 99.4668 131.721 93.725Z" fill="white" fill-opacity="0.25"/>
                        <path id="F5" d="M61.8759 121.432C61.8759 121.432 64.6754 164.455 61.4339 166.371C57.6767 168.581 55.6877 189.798 55.6877 189.798C55.6877 189.798 53.7722 184.42 51.6358 184.641C49.4994 184.862 45.4475 188.914 44.5635 190.387C43.7531 191.787 31.2292 146.038 61.8759 121.432Z" fill="white" fill-opacity="0.25"/>
                        <path id="F9" d="M160.005 127.031C160.005 127.031 157.205 170.055 160.52 171.97C164.278 174.18 166.267 195.397 166.267 195.397C166.267 195.397 168.182 190.019 170.319 190.24C172.455 190.461 176.507 194.513 177.391 195.986C178.201 197.386 190.725 151.637 160.005 127.031Z" fill="white" fill-opacity="0.25"/>
                        <path id="F3" d="M104.974 98.8892C104.163 109.129 110.131 121.801 110.204 129.462C110.278 139.776 109.394 148.175 91.0501 150.237C76.3898 151.858 73.0746 145.817 68.2861 142.723C65.3393 140.808 64.3816 121.285 61.7294 118.338C59.8877 116.349 71.9696 95.5004 88.6927 95.6477C105.489 95.7951 105.195 96.6791 104.974 98.8892Z" fill="white" fill-opacity="0.25"/>
                        <path id="F2" d="M115.438 98.8892C116.249 109.129 110.281 121.801 110.208 129.462C110.134 139.776 111.018 148.175 129.362 150.237C144.022 151.858 147.337 145.817 152.126 142.723C155.073 140.808 156.031 121.285 158.756 118.338C160.598 116.349 148.516 95.5004 131.793 95.6477C114.996 95.7951 115.291 96.6791 115.438 98.8892Z" fill="white" fill-opacity="0.25"/>
                        <path id="F6" d="M89.5037 157.089C89.5037 157.089 93.1135 238.568 89.5037 241.515C85.9675 244.461 85.2308 225.233 72.1175 223.097C69.6864 222.655 71.6755 178.969 65.8556 168.508C59.962 158.046 86.9989 153.7 89.5037 157.089Z" fill="white" fill-opacity="0.25"/>
                        <path id="F8" d="M130.245 157.089C130.245 157.089 126.635 238.568 130.245 241.515C133.781 244.461 134.518 225.233 147.631 223.097C150.062 222.655 148.073 178.969 153.893 168.508C159.787 158.046 132.75 153.7 130.245 157.089Z" fill="white" fill-opacity="0.25"/>
                        <path id="F18" d="M78.2073 241.532C78.2073 241.532 105.516 302.038 103.455 330.378C101.394 358.717 98.1992 367.938 98.1992 375.152C98.1992 382.366 100.29 364.974 91.2359 364.9C80.6362 364.827 72.7601 373.439 69.8892 382.861C69.4479 384.186 68.4173 355.993 68.4173 355.993C68.4173 355.993 65.3401 348.191 62.8375 322.134C59.0833 282.532 87.5553 268.325 78.2073 241.532Z" fill="white" fill-opacity="0.25"/>
                        <path id="F19" d="M141.655 241.532C141.655 241.532 113.316 302.038 115.377 330.378C118.304 352.085 122.508 367.938 122.508 375.152C122.508 382.366 121.634 364.974 130.688 364.9C141.288 364.827 147.103 373.439 149.973 382.861C150.415 384.186 152.181 355.993 152.181 355.993C152.181 355.993 155.367 346.694 157.869 320.636C161.55 281.035 132.234 268.325 141.655 241.532Z" fill="white" fill-opacity="0.25"/>
                        <path id="F20" d="M92.8948 391.212C92.8948 391.212 92.8948 400.347 88.8429 404.694C84.7911 409.04 73.1512 408.083 71.6041 391.212C70.057 374.415 83.244 367.638 92.8948 381.635C92.8948 381.635 93.8525 383.845 92.8948 391.212Z" fill="white" fill-opacity="0.25"/>
                        <path id="F21" d="M126.559 391.212C126.559 391.212 126.559 400.347 130.611 404.694C134.663 409.04 146.303 408.083 147.85 391.212C149.397 374.415 136.21 367.638 126.559 381.635C126.559 381.635 125.528 383.845 126.559 391.212Z" fill="white" fill-opacity="0.25"/>
                        <path id="F22" d="M69.9795 415.008C69.9795 415.008 81.8404 403.957 91.7858 417.439C91.7858 417.439 85.3765 468.713 89.5021 482.269C89.5757 482.195 74.6207 447.349 69.9795 415.008Z" fill="white" fill-opacity="0.25"/>
                        <path id="F23" d="M150.873 415.008C150.873 415.008 139.012 403.957 129.067 417.439C129.067 417.439 135.476 468.713 131.351 482.269C131.351 482.195 146.306 447.349 150.873 415.008Z" fill="white" fill-opacity="0.25"/>
                        <path id="F16" d="M17.8975 255.371C17.8975 255.371 21.886 262.29 34.1049 259.052L35.1444 254.856C35.1444 254.856 28.2989 253.31 28.9612 244.55C28.9612 244.55 25.7028 252.795 20.8443 250.733L17.8975 255.371Z" fill="white" fill-opacity="0.25"/>
                        <path id="F17" d="M204.281 258.462C204.281 258.462 199.85 267.001 186.601 263.468V259.051C186.601 259.051 193.55 256.769 192.887 247.126C192.887 247.126 197.598 257.137 202.898 254.856L204.281 258.462Z" fill="white" fill-opacity="0.25"/>
                        <path id="F10" d="M36.3913 192.008C36.3913 192.008 50.5359 195.618 53.6301 205.122C53.6301 205.122 48.5469 223.465 34.9915 244.756C34.9915 244.756 32.7814 245.787 26.4458 241.809C26.3721 241.736 30.424 202.543 36.3913 192.008Z" fill="white" fill-opacity="0.25"/>
                        <path id="F15" d="M184.173 195.25C184.173 195.25 170.028 198.86 166.934 208.363C166.934 208.363 172.017 226.707 185.573 247.998C185.573 247.998 187.783 249.029 194.118 245.051C194.192 244.977 190.14 205.711 184.173 195.25Z" fill="white" fill-opacity="0.25"/>
                        <path id="F14" d="M150.504 229.507L140.558 238.937C140.558 238.937 165.238 272.678 163.543 281.518C163.543 281.518 166.711 248.219 150.504 229.507Z" fill="white" fill-opacity="0.25"/>
                        <path id="F11" d="M67.9735 230.933L77.6899 240.354C77.6899 240.354 57.4984 271.779 58.4156 282.827C58.4156 282.9 52.2988 262.824 67.9735 230.933Z" fill="white" fill-opacity="0.25"/>
                        <path id="F12" d="M84.9043 244.329C84.9043 244.329 105.515 307.316 105.073 324.32L107.775 302.628L109.858 276.865C109.858 276.865 101.908 250.439 86.8183 241.164C86.892 241.164 84.3894 240.722 84.9043 244.329Z" fill="white" fill-opacity="0.25"/>
                        <path id="F13" d="M135.546 244.771C135.546 244.771 114.183 307.243 114.404 324.32L111.457 302.628L110.666 276.434C110.666 276.434 118.468 250.733 133.632 241.605C133.632 241.605 136.135 241.164 135.546 244.771Z" fill="white" fill-opacity="0.25"/>
                        <path id="F7" d="M91.127 155.837C91.127 155.837 109.987 133.293 128.699 155.837C128.699 155.837 129.951 226.928 125.015 244.977C125.015 244.977 109.913 257.722 94.5158 244.977C94.4421 245.051 90.0219 210.868 91.127 155.837Z" fill="white" fill-opacity="0.25"/>
                        <path id="F26" d="M102.617 84.8919C99.0122 90.9704 83.8274 89.4572 79.0425 86.3653C95.8076 88.7986 95.6897 61.411 93.0398 58.4664C95.0458 57.1411 105.71 73.9556 102.617 84.8919Z" fill="white" fill-opacity="0.25"/>
                        <path id="F27" d="M117.618 84.8919C122.83 90.0024 135.55 89.4572 140.335 86.3653C123.57 88.7986 123.688 61.411 126.338 58.4664C124.331 57.1411 114.524 73.9556 117.618 84.8919Z" fill="white" fill-opacity="0.25"/>
                        <path id="F24" d="M84.9072 487.131C84.9072 487.131 89.0909 478.398 96.7275 486.161C96.7275 486.161 97.9976 507.689 103.358 515.862C103.358 515.862 84.4924 518.778 78.2091 514.389C78.1789 514.414 84.4563 506.082 84.9072 487.131Z" fill="white" fill-opacity="0.25"/>
                        <path id="F25" d="M135.831 487.131C135.831 487.131 131.647 478.398 124.01 486.161C124.01 486.161 122.74 507.689 117.38 515.862C117.38 515.862 136.245 518.778 142.529 514.389C142.559 514.414 136.281 506.082 135.831 487.131Z" fill="white" fill-opacity="0.25"/>
                    </svg>
                    @if($errors->has('dropdownF'))
                        <p class="text-red-500 text-sm mt-1">{{ $errors->first('dropdownF') }}</p>
                    @endif
                </div>
                <div class="col-3">
                    <svg class="workout-muscles" id="backSVG" viewBox="0 0 219 518" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path id="B2" d="M105.423 191.186C105.643 192.145 107.328 183.592 109.379 184.55C111.504 185.509 114.068 191.186 114.068 190.965C113.408 183.961 119.635 173.122 124.177 165.676C129.086 157.639 131.65 157.197 134.946 146.801C136.265 142.672 134.946 115.613 140.587 105.659C146.228 95.7056 150.184 96.7378 154.433 94.3047C155.385 93.7886 119.855 90.9132 116.778 66.8034C116.265 62.822 116.265 59.2092 116.852 55.5227C117.511 51.9099 98.3905 50.4353 97.3649 55.3015C95.8265 62.7482 109.013 84.0562 64.0326 90.9869C60.8825 91.503 73.3363 96.2955 80.2226 106.839C81.9075 109.419 81.8342 115.465 87.0356 149.602C88.2077 157.27 103.152 179.832 105.423 191.186Z" fill="white" fill-opacity="0.25"/>
                        <path id="B5" d="M117.489 188.887C117.489 188.887 130.372 202.074 131.763 209.956C133.153 217.839 133.153 229.847 139.888 228.742C139.961 228.742 137.618 225.796 140.693 220.418C151.38 201.926 150.94 180.416 150.94 180.416L151.892 146.675C151.892 146.675 145.597 148.811 137.691 143.581C136.081 142.549 137.033 155.81 129.42 162.735C126.199 165.534 114.415 181.005 117.489 188.887Z" fill="white" fill-opacity="0.25"/>
                        <path id="B6" d="M100.797 188.887C100.797 188.887 87.9148 202.074 86.5236 209.956C85.1332 217.839 86.8899 228.935 80.1553 227.83C80.082 227.83 80.6681 225.796 77.5935 220.418C66.9066 201.926 66.3945 180.416 66.3945 180.416V148.201C66.3945 148.201 72.6896 148.811 80.5948 143.581C82.2051 142.549 81.2534 155.81 88.8657 162.735C92.0868 165.534 103.871 181.005 100.797 188.887Z" fill="white" fill-opacity="0.25"/>
                        <path id="B7" d="M154.013 121.628C154.013 121.628 163.455 116.029 166.822 117.649C170.189 119.271 176.338 129.584 177.069 133.857C176.114 144.758 179.049 171.87 179.049 171.87C179.049 171.87 179.705 176.142 176.338 177.174C173.044 178.205 173.483 168.407 170.994 167.302C168.506 166.198 170.848 174.891 168.359 175.627C165.871 176.29 158.478 173.27 158.478 173.27L152.915 159.272C152.842 159.272 158.112 129.142 154.013 121.628Z" fill="white" fill-opacity="0.25"/>
                        <path id="B4" d="M63.834 120.965C63.834 120.965 54.3917 115.292 51.0241 116.913C47.6571 118.533 41.5086 128.995 40.7768 133.341C41.1057 146.203 39.1263 171.058 39.1263 171.058C39.1263 171.058 38.1417 176.142 41.5086 177.174C44.8023 178.205 44.3635 168.26 46.852 167.155C49.3406 166.05 46.9986 174.89 49.4871 175.553C51.9757 176.216 59.3689 173.196 59.3689 173.196L64.9321 159.052C65.0054 159.052 59.7352 128.553 63.834 120.965Z" fill="white" fill-opacity="0.25"/>
                        <path id="B12" d="M71.654 225.84C73.7053 225.471 106.159 241.765 107.917 266.981C109.675 292.123 90.2616 301.192 73.8518 296.768C57.442 292.344 58.6874 272.658 59.1269 267.94C59.42 264.548 62.3503 256.954 64.9876 238.595C65.5004 235.351 69.6028 226.208 71.654 225.84Z" fill="white" fill-opacity="0.25"/>
                        <path id="B13" d="M151.066 228.936C149.234 228.199 116.488 238.005 110.334 262.336C104.254 286.667 120.517 299.275 136.414 298.095C152.311 296.915 154.655 277.377 155.095 272.658C155.388 269.266 154.069 261.304 154.875 242.724C155.022 239.479 152.897 229.673 151.066 228.936Z" fill="white" fill-opacity="0.25"/>
                        <path id="B15" d="M116.757 299.318C116.757 299.318 148.158 300.57 153.136 296.149C158.114 291.729 157.235 320.977 150.94 351.697C146.583 381.982 149.161 382.737 148.282 381.926C141.214 376.618 138.716 363.041 138.277 363.409C137.911 363.704 123.784 384.699 126.053 401.054C126.199 402.012 114.362 326.796 112.386 317.661C110.336 308.673 109.042 299.428 116.757 299.318Z" fill="white" fill-opacity="0.25"/>
                        <path id="B16" d="M101.164 299.318C101.164 299.318 69.9083 300.57 64.9312 296.15C59.9533 291.729 60.0998 320.239 66.3949 350.959C70.2607 380.088 68.2827 383.474 69.1611 382.664C75.4312 378.065 79.2773 363.041 79.7168 363.409C80.0824 363.704 94.1369 384.699 91.8674 401.054C91.7208 402.012 103.359 322.493 105.336 313.357C107.312 304.37 107.458 299.612 101.164 299.318Z" fill="white" fill-opacity="0.25"/>
                        <path id="B18" d="M139.302 385.583C139.302 385.583 125.028 403.78 124.077 411.22C121.825 425.188 124.985 452.363 125.541 460.8C127.518 465.366 137.253 450.633 139.668 441.424C142.083 432.216 137.079 449.97 143.154 456.6C144.179 457.705 155.434 420.562 152.917 407.732C150.139 394.832 149.114 394.832 148.282 389.299C147.965 377.486 143.035 385.583 141.864 391.035C140.693 396.486 139.302 385.583 139.302 385.583Z" fill="white" fill-opacity="0.25"/>
                        <path id="B17" d="M79.0576 385.584C79.0576 385.584 93.1165 404.715 94.0681 412.156C95.1751 430.46 92.5224 449.762 91.8667 460.8C89.8902 465.367 81.1066 450.634 78.6913 441.425C76.276 432.216 81.0964 449.971 75.0211 456.601C73.9962 457.706 63.1951 424.094 64.9306 411.221C66.0946 397.145 70.9912 394.823 69.893 387.088C70.6908 380.667 75.3244 385.584 76.4958 391.035C77.6664 396.487 79.0576 385.584 79.0576 385.584Z" fill="white" fill-opacity="0.25"/>
                        <path id="B20" d="M121.175 495.939C121.175 495.939 119.715 481.058 125.571 467.061C125.571 467.061 133.811 475.091 130.663 494.54C130.663 494.54 132.391 472.881 140.955 463.083C140.955 463.083 136.885 479.217 138.788 496.602C138.788 496.602 129.52 503.896 121.175 495.939Z" fill="white" fill-opacity="0.25"/>
                        <path id="B19" d="M98.4657 494.687C98.4657 494.687 97.6547 479.975 91.8724 465.978C91.8724 465.978 85.94 473.839 89.0872 493.287C89.0872 493.287 85.0521 472.881 76.4883 463.083C76.4883 463.083 81.3218 478.554 79.4186 495.939C79.4186 496.013 90.1208 502.717 98.4657 494.687Z" fill="white" fill-opacity="0.25"/>
                        <path id="B1" d="M58.9068 92.7563C58.9068 92.7563 49.3832 92.7564 42.8633 113.622C42.8633 113.622 55.3171 111.263 62.8627 118.12C62.8627 118.12 71.2873 110.673 69.5292 105.438C69.5292 105.438 71.7269 99.3183 58.9068 92.7563Z" fill="white" fill-opacity="0.25"/>
                        <path id="B3" d="M159.707 93.4937C159.707 93.4937 169.231 93.4937 175.751 114.359C175.751 114.359 163.297 112 155.752 118.857C155.752 118.857 147.327 111.41 149.085 106.175C149.085 106.175 146.887 100.056 159.707 93.4937Z" fill="white" fill-opacity="0.25"/>
                        <path id="B9" d="M88.573 229.526C88.573 229.526 85.8624 200.402 108.353 194.577C108.353 194.577 130.33 192.071 129.89 229.526C129.89 229.526 122.052 233.507 109.232 250.023C109.158 250.023 101.54 238.078 88.573 229.526Z" fill="white" fill-opacity="0.25"/>
                        <path id="B8" d="M36.5612 183.224C36.5612 183.224 46.3778 169.952 55.6083 183.224C55.6083 183.224 57.8793 191.334 43.4475 199.002C43.4475 199.002 34.8763 199.149 36.5612 183.224Z" fill="white" fill-opacity="0.25"/>
                        <path id="B10" d="M181.466 182.486C181.466 182.486 171.65 169.214 162.419 182.486C162.419 182.486 160.148 190.596 174.58 198.264C174.58 198.264 183.151 198.412 181.466 182.486Z" fill="white" fill-opacity="0.25"/>
                        <path id="B11" d="M205.514 262.483C205.514 262.483 191.365 241.053 185.531 264.414C185.531 264.414 180.748 281.773 197.682 280.179C197.682 280.179 211.164 272.82 205.514 262.483Z" fill="white" fill-opacity="0.25"/>
                        <path id="B14" d="M12.7524 262.483C12.7524 262.483 26.9015 241.053 32.7357 264.414C32.7357 264.414 37.5187 281.773 20.5844 280.179C20.5844 280.179 7.10278 272.82 12.7524 262.483Z" fill="white" fill-opacity="0.25"/>
                        </svg>
                        @if($errors->has('dropdownB'))
                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('dropdownB') }}</p>
                        @endif

                </div>
                <div class="col-3">
                <input type="text" name="dropdownB" class="d-none">
                <input type="text" name="dropdownF" class="d-none">
                </div>

            </div>





            <!-- Save Button -->
            <div class="mb-4">
                <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 rounded transition duration-300">Add Workout</button>
            </div>
        </form>
    </div>

    @push('pageCustomScript')
    <script>


        jQuery(() => {

            var frontMusc = [];
            var  backMusc = [];

            $("#backSVG path").click(function(){
                let id = $(this).attr("id");
                $(this).toggleClass("selected_muscle");
                UpdateMuscles(id,backMusc,"dropdownB");
            })
            $("#frontSVG path").click(function(){
                let id = $(this).attr("id");
                $(this).toggleClass("selected_muscle");
                UpdateMuscles(id,frontMusc,"dropdownF");
            })
        })

        function UpdateMuscles(value,array, inputField){

            var index = array.indexOf(value);

            if (index !== -1) {
                array.splice(index, 1);
            } else {
                array.push(value);
            }

            $("input[name='"+inputField+"']").val(array);

        }

        </script>
    @endpush
</x-app-layout>
