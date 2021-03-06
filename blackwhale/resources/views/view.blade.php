@extends('layout.head')

@section('link')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
@endsection

@section('style')
    <style>
        body{
        background: black;
        }

        .navbar{
            display: none;
        }

        body{
            background: white;
        }

        .leftsection{
             z-index: 1; 
            position: absolute;
            height: 100vh;
            width: 100%;
            background: black;
            display: flex;
            flex-direction: column;
            align-content: center;
            justify-content: center;
            align-items: center;
            transition: all 2s ease;
        }

        .leftsection img{
            width: 100%;
        }
        
        .rightsection{
            position: relative;
            left:40%;
            width: 60%;
        }
        #start:checked ~ .leftsection{
            width: 30%;
        }

        #check:checked ~ .team{
            display: block;
        }

        .button{
            position: absolute;
            top: 50%;
            left: 47.5%;
            transform: translate(-50%, -100%);
            color: white;
        }

        img{
            cursor: pointer;
        }

        span{
            font-size: 1.5rem;
            display: inline-block;
            color: #b57622;
            font-weight: 900;
            text-transform: uppercase;
            justify-content: center;
            align-items: center;
        }


    </style>
@endsection

@section('script')
    <script src="/js/view.js" defer></script>

@endsection

@section('content')

    <input type="checkbox" id="start">
    <input type="checkbox" id="check">

    <div class="full">
        
    </div>
    <div class="leftsection">
        <div class="title">
            <svg id="logo"width="1262" height="53" viewBox="0 0 1262 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M66.3215 47.002C59.2141 49.6673 50.3807 51 39.8212 51C28.111 51 18.8715 48.8964 12.1026 44.6891C5.36753 40.4599 2 34.6446 2 27.2434C2 19.7982 5.68905 13.7296 13.0672 9.03776C20.4453 4.34592 30.2602 2 42.5119 2C50.2284 2 57.0312 2.69386 62.9201 4.08159V14.0931C57.3019 11.9784 50.4315 10.9211 42.3088 10.9211C35.5061 10.9211 29.9556 12.3639 25.6573 15.2495C21.3929 18.1131 19.2607 21.9458 19.2607 26.7478C19.2607 31.6159 21.1729 35.3826 24.9973 38.0479C28.8556 40.7132 34.0507 42.0459 40.5827 42.0459C44.5087 42.0459 47.6224 41.6824 49.9238 40.9555V31.704H35.3538V23.1794H66.3215V47.002Z" stroke="white" stroke-width="3"/>
                <path d="M141.558 50.174H122.723L111.402 37.9818C110.556 37.0566 109.744 36.2306 108.966 35.5037C108.187 34.7768 107.392 34.16 106.579 33.6534C105.801 33.1247 104.972 32.7283 104.092 32.4639C103.246 32.1776 102.315 32.0344 101.3 32.0344H96.8831V50.174H80.4854V2.79299H106.478C124.145 2.79299 132.978 7.08833 132.978 15.679C132.978 17.3311 132.589 18.862 131.811 20.2717C131.032 21.6595 129.932 22.915 128.511 24.0384C127.089 25.1618 125.363 26.131 123.333 26.9461C121.336 27.7611 119.102 28.3999 116.631 28.8624V28.9946C117.714 29.2149 118.764 29.5783 119.779 30.085C120.794 30.5696 121.776 31.1423 122.723 31.8031C123.671 32.4639 124.568 33.1798 125.414 33.9508C126.294 34.6997 127.089 35.4376 127.8 36.1645L141.558 50.174ZM96.8831 10.7889V23.9724H103.99C107.51 23.9724 110.336 23.3115 112.468 21.9899C114.634 20.6462 115.718 18.9831 115.718 17.0007C115.718 12.8595 111.91 10.7889 104.295 10.7889H96.8831Z" stroke="white" stroke-width="3"/>
                <path d="M164.809 33.8517V50.174H148.411V2.79299H174.099C192.443 2.79299 201.615 7.82625 201.615 17.8928C201.615 22.6507 198.975 26.5055 193.695 29.4572C188.449 32.3868 181.427 33.8517 172.627 33.8517H164.809ZM164.809 10.9872V25.7566H171.256C179.988 25.7566 184.354 23.2675 184.354 18.2893C184.354 13.4212 179.988 10.9872 171.256 10.9872H164.809Z" stroke="white" stroke-width="3"/>
                <path d="M262.18 51C244.851 51 236.187 43.0811 236.187 27.2434C236.187 19.0272 238.522 12.7714 243.193 8.47606C247.897 4.15869 254.7 2 263.601 2C280.523 2 288.984 10.051 288.984 26.1531C288.984 34.171 286.666 40.3167 282.029 44.59C277.427 48.8633 270.81 51 262.18 51ZM262.89 9.96291C255.952 9.96291 252.483 15.635 252.483 26.9791C252.483 37.6624 255.884 43.004 262.687 43.004C269.321 43.004 272.638 37.4972 272.638 26.4835C272.638 15.4698 269.388 9.96291 262.89 9.96291Z" stroke="white" stroke-width="3"/>
                <path d="M314.266 41.5172H345.132V50.174H296.701V46.6055C296.701 44.1825 297.327 42.0128 298.579 40.0964C299.832 38.158 301.405 36.4289 303.301 34.909C305.196 33.367 307.26 32.0124 309.494 30.8449C311.762 29.6554 313.911 28.5871 315.942 27.6399C318.074 26.6487 319.935 25.7015 321.526 24.7984C323.15 23.8953 324.504 23.0031 325.587 22.122C326.704 21.2189 327.533 20.3158 328.075 19.4127C328.616 18.4875 328.887 17.5073 328.887 16.472C328.887 14.4455 328.007 12.9146 326.247 11.8793C324.487 10.844 321.797 10.3264 318.175 10.3264C311.914 10.3264 305.924 11.9454 300.204 15.1834V5.99798C306.533 3.33266 313.674 2 321.627 2C325.316 2 328.616 2.3194 331.527 2.95819C334.471 3.57496 336.959 4.46707 338.99 5.63452C341.02 6.80198 342.56 8.22275 343.609 9.89683C344.692 11.5489 345.234 13.3992 345.234 15.4477C345.234 17.6285 344.709 19.5669 343.66 21.263C342.645 22.9591 341.274 24.501 339.548 25.8887C337.856 27.2765 335.893 28.5541 333.659 29.7215C331.425 30.8669 329.107 31.9793 326.704 33.0587C325.08 33.8076 323.506 34.5565 321.983 35.3055C320.494 36.0324 319.174 36.7593 318.023 37.4862C316.872 38.1911 315.958 38.8849 315.282 39.5678C314.605 40.2506 314.266 40.9004 314.266 41.5172Z" stroke="white" stroke-width="3"/>
                <path d="M387.32 35.768H359.55V28.4659H387.32V35.768Z" stroke="white" stroke-width="3"/>
                <path d="M400.265 48.621V39.5347C405.139 41.8476 410.825 43.004 417.323 43.004C421.418 43.004 424.599 42.4313 426.867 41.2859C429.168 40.1405 430.319 38.5435 430.319 36.4949C430.319 34.3803 428.898 32.7503 426.055 31.6049C423.246 30.4594 419.37 29.8867 414.429 29.8867H407.677V21.8908H413.921C423.398 21.8908 428.136 19.8422 428.136 15.7451C428.136 11.8903 424.498 9.96291 417.221 9.96291C412.348 9.96291 407.609 10.9872 403.007 13.0357V4.51113C408.117 2.83704 414.074 2 420.876 2C428.322 2 434.11 3.09036 438.239 5.27107C442.402 7.45179 444.483 10.2823 444.483 13.7626C444.483 19.9523 439.66 23.8292 430.014 25.3931V25.5583C435.159 25.9768 439.22 27.1994 442.198 29.2259C445.177 31.2304 446.666 33.6975 446.666 36.6271C446.666 41.0546 444.178 44.557 439.203 47.1342C434.228 49.7114 427.358 51 418.592 51C411.078 51 404.97 50.207 400.265 48.621Z" stroke="white" stroke-width="3"/>
                <path d="M509.312 24.2036C509.312 28.4109 508.601 32.1776 507.18 35.5037C505.758 38.8078 503.677 41.6053 500.936 43.8962C498.228 46.187 494.911 47.9492 490.985 49.1827C487.059 50.3942 482.609 51 477.634 51C471.677 51 466.55 50.3832 462.251 49.1497V40.559C466.076 42.189 470.679 43.004 476.06 43.004C481.577 43.004 485.892 41.7815 489.005 39.3365C492.119 36.8914 493.693 33.356 493.727 28.7303L493.422 28.6642C490.207 31.7701 485.316 33.323 478.751 33.323C475.772 33.323 473.014 32.9595 470.476 32.2326C467.971 31.5057 465.788 30.5035 463.927 29.2259C462.099 27.9263 460.661 26.3844 459.611 24.6001C458.596 22.8159 458.088 20.8555 458.088 18.7188C458.088 16.2297 458.715 13.9609 459.967 11.9123C461.219 9.86379 462.962 8.1016 465.196 6.62576C467.463 5.14992 470.171 4.01551 473.318 3.22252C476.466 2.40751 479.952 2 483.776 2C487.736 2 491.29 2.50663 494.437 3.51989C497.585 4.51113 500.259 5.95392 502.459 7.84828C504.692 9.74264 506.385 12.0665 507.535 14.82C508.72 17.5734 509.312 20.7013 509.312 24.2036ZM493.118 18.6527C493.118 17.4412 492.881 16.3068 492.407 15.2495C491.933 14.1702 491.273 13.245 490.427 12.474C489.581 11.7031 488.548 11.0973 487.33 10.6568C486.112 10.1942 484.775 9.96291 483.32 9.96291C481.932 9.96291 480.646 10.1612 479.461 10.5577C478.311 10.9541 477.312 11.5048 476.466 12.2097C475.62 12.8926 474.96 13.7186 474.486 14.6878C474.012 15.657 473.775 16.7033 473.775 17.8267C473.775 19.0602 474.012 20.1616 474.486 21.1308C474.96 22.078 475.62 22.882 476.466 23.5428C477.346 24.2036 478.395 24.7103 479.614 25.0627C480.832 25.3931 482.186 25.5583 483.675 25.5583C485.096 25.5583 486.382 25.3821 487.533 25.0297C488.684 24.6552 489.665 24.1596 490.478 23.5428C491.324 22.9261 491.967 22.1991 492.407 21.3621C492.881 20.5251 493.118 19.6219 493.118 18.6527Z" stroke="white" stroke-width="3"/>
                <path d="M550.992 50.174V2.79299H577.492C585.614 2.79299 591.859 3.76219 596.225 5.70061C600.591 7.63902 602.774 10.3704 602.774 13.8948C602.774 16.45 601.437 18.6858 598.763 20.6022C596.123 22.5185 592.739 23.8512 588.61 24.6001V24.7323C593.788 25.1508 597.917 26.3954 600.997 28.4659C604.111 30.5365 605.667 33.0587 605.667 36.0324C605.667 40.3718 603.281 43.8191 598.509 46.3742C593.737 48.9074 587.222 50.174 578.964 50.174H550.992ZM567.389 10.6568V21.8908H574.598C577.983 21.8908 580.639 21.3621 582.569 20.3048C584.532 19.2254 585.513 17.7496 585.513 15.8773C585.513 12.3969 581.519 10.6568 573.532 10.6568H567.389ZM567.389 29.8206V42.3102H576.273C580.064 42.3102 583.025 41.7375 585.158 40.592C587.324 39.4466 588.407 37.8827 588.407 35.9002C588.407 34.0058 587.341 32.519 585.208 31.4396C583.11 30.3603 580.166 29.8206 576.375 29.8206H567.389Z" stroke="white" stroke-width="3"/>
                <path d="M661.054 50.174H617.699V2.79299H634.097V41.5172H661.054V50.174Z" stroke="white" stroke-width="3"/>
                <path d="M737.255 50.174H719.385L714.207 39.6338H688.316L683.188 50.174H665.42L691.92 2.79299H711.364L737.255 50.174ZM710.45 31.4396L702.632 15.5138C702.056 14.3243 701.65 12.9036 701.413 11.2515H701.007C700.838 12.6392 700.415 14.016 699.738 15.3817L691.819 31.4396H710.45Z" stroke="white" stroke-width="3"/>
                <path d="M796.906 48.4889C791.592 50.163 784.654 51 776.091 51C764.923 51 756.14 48.8633 749.743 44.59C743.347 40.3167 740.148 34.6226 740.148 27.5078C740.148 19.9303 743.736 13.7847 750.911 9.0708C758.12 4.35693 767.461 2 778.934 2C786.042 2 792.032 2.58373 796.906 3.75118V14.027C792.032 12.1326 786.482 11.1854 780.254 11.1854C773.418 11.1854 767.901 12.5842 763.704 15.3817C759.508 18.1791 757.409 21.9679 757.409 26.7478C757.409 31.3295 759.389 34.9861 763.349 37.7175C767.309 40.4268 772.639 41.7815 779.34 41.7815C785.737 41.7815 791.592 40.7683 796.906 38.7417V48.4889Z" stroke="white" stroke-width="3"/>
                <path d="M870.111 50.174H849.399L828.178 29.5893C827.772 29.1929 827.129 28.3228 826.249 26.9791H825.995V50.174H809.597V2.79299H825.995V25.1949H826.249C826.655 24.5781 827.332 23.697 828.28 22.5516L848.383 2.79299H867.928L842.545 25.3931L870.111 50.174Z" stroke="white" stroke-width="3"/>
                <path d="M1001.09 2.79299L981.849 50.174H963.674L951.592 19.7761C950.949 18.1902 950.56 16.4169 950.424 14.4565H950.221C949.917 16.6152 949.477 18.3884 948.901 19.7761L936.514 50.174H917.578L898.439 2.79299H916.36L926.615 34.3473C927.055 35.6909 927.376 37.4972 927.579 39.766H927.884C928.019 38.0699 928.51 36.2196 929.356 34.2151L942.556 2.79299H960.121L972.051 34.6116C972.491 35.779 972.88 37.4752 973.219 39.6999H973.422C973.557 37.9598 973.912 36.1976 974.488 34.4133L984.54 2.79299H1001.09Z" stroke="white" stroke-width="3"/>
                <path d="M1073.33 50.174H1056.88V30.8779H1026.73V50.174H1010.33V2.79299H1026.73V21.6925H1056.88V2.79299H1073.33V50.174Z" stroke="white" stroke-width="3"/>
                <path d="M1154.05 50.174H1136.18L1131 39.6338H1105.11L1099.98 50.174H1082.21L1108.72 2.79299H1128.16L1154.05 50.174ZM1127.24 31.4396L1119.43 15.5138C1118.85 14.3243 1118.45 12.9036 1118.21 11.2515H1117.8C1117.63 12.6392 1117.21 14.016 1116.53 15.3817L1108.61 31.4396H1127.24Z" stroke="white" stroke-width="3"/>
                <path d="M1206.49 50.174H1163.14V2.79299H1179.53V41.5172H1206.49V50.174Z" stroke="white" stroke-width="3"/>
                <path d="M1260 50.174H1216.34V2.79299H1258.32V11.4828H1232.74V22.0229H1256.55V30.6797H1232.74V41.5172H1260V50.174Z" stroke="white" stroke-width="3"/>
            </svg>
                
        </div>
        <div class="pic">
            <label for="start">
                <img src="/image/Theme.jpg" alt="" style="">
            </label>
        </div>
    </div>


    
    <div class="rightsection">
        {{-- <label for="check">
        <i class="fas fa-arrow-circle-right" id="btn" style="color: black"></i>
        </label> --}}
        <div class="team">
            <div class="container py-1 text-center">
                <div class="row mb-5">
                    <div class="col m-3">
                        <h1>Our Team</h1>
                        <p class="mt-3">
                            Laravel: Black Whale Self- Service Pick-Up Portal
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <img src="/profile/black.jpg" alt="person A" class="img-fluid rounded-circle w-50 mb-3">
                                <h4>Chee Weng Kee</h4>
                                <h5>Product Owner</h5>
                                <p>A product owner plays his roles in ensuring that the software product
                                    vision statement is adhered to. </p>
                                <div class="d-flex flex-row justify-content-center">
                                    <div class="p-4">
                                        <a href="https://www.facebook.com/chee.wengkee">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </div>
                                    <div class="p-4">
                                        <a href="#">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </div>
                                    <div class="p-4">
                                        <a href="https://www.instagram.com/sm3ll_bl3ck/">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <img src="/profile/joan.jpeg" alt="person A" class="img-fluid rounded-circle w-50 mb-3">
                                <h4>Tan Ser Xuen</h4>
                                <h5>Scrum Master</h5>
                                <p>A scrum master ensures there is an effective collaboration realistic
                                    commitments in between the team. </p>
                                <div class="d-flex flex-row justify-content-center">
                                    <div class="p-4">
                                        <a href="https://www.facebook.com/tan.xuen.10">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </div>
                                    <div class="p-4">
                                        <a href="#">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </div>
                                    <div class="p-4">
                                        <a href="https://www.instagram.com/tan.xuen/">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <img src="/profile/khew.jpeg" alt="person A" class="img-fluid rounded-circle w-50 mb-3">
                                <h4>Khew Jia Peng</h4>
                                <h5>Back-end Programmer</h5>
                                <p>responsible for building the databases and
                                    communicating to project manager. </p>
                                <div class="d-flex flex-row justify-content-center">
                                    <div class="p-4">
                                        <a href="https://www.facebook.com/khew.jason">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </div>
                                    <div class="p-4">
                                        <a href="#">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </div>
                                    <div class="p-4">
                                        <a href="https://www.instagram.com/jpq_25/">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <img src="/profile/cm.jpg" alt="person A" class="img-fluid rounded-circle w-50 mb-3">
                                <h4>Tan Chee Ming</h4>
                                <h5>Front-end Programmer</h5>
                                <p>responsible for building the user interface
                                    design according to the user’s requirements. </p>
                                <div class="d-flex flex-row justify-content-center">
                                    <div class="p-4">
                                        <a href="https://www.facebook.com/ming.cassiopieans/">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </div>
                                    <div class="p-4">
                                        <a href="#">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </div>
                                    <div class="p-4">
                                        <a href="https://www.instagram.com/cmtan0108/">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div>


           
        <div class="right-bottom">
            <div class="time">
                <svg width="320" height="208" viewBox="0 0 345 208" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="undraw_season_change_f99v 1">
                    <g id="stopwatch">
                    <path id="Vector" d="M177.361 202.198C222.295 202.198 258.722 165.95 258.722 121.235C258.722 76.5208 222.295 40.2726 177.361 40.2726C132.426 40.2726 96 76.5208 96 121.235C96 165.95 132.426 202.198 177.361 202.198Z" fill="#3F3D56"/>
                    <path id="Vector_2" d="M177.559 195.836C218.774 195.836 252.185 162.589 252.185 121.576C252.185 80.5627 218.774 47.3152 177.559 47.3152C136.344 47.3152 102.933 80.5627 102.933 121.576C102.933 162.589 136.344 195.836 177.559 195.836Z" fill="white"/>
                    <path id="Vector_3" d="M179.247 50.7281H174.936V58.7707H179.247V50.7281Z" fill="#3F3D56"/>
                    <path id="Vector_4" d="M179.247 184.236H174.936V192.279H179.247V184.236Z" fill="#3F3D56"/>
                    <path id="Vector_5" d="M114.05 123.648V119.359H105.968V123.648H114.05Z" fill="#3F3D56"/>
                    <path id="Vector_6" d="M248.215 123.648V119.359H240.132V123.648H248.215Z" fill="#3F3D56"/>
                    <path id="Vector_7" d="M187.868 20.7022H166.854V44.8301H187.868V20.7022Z" fill="#3F3D56"/>
                    <path id="Vector_8" d="M177.361 27.4044C190.752 27.4044 201.607 24.4037 201.607 20.7022C201.607 17.0007 190.752 14 177.361 14C163.97 14 153.114 17.0007 153.114 20.7022C153.114 24.4037 163.97 27.4044 177.361 27.4044Z" fill="#3F3D56"/>
                    <path id="Vector_9" d="M176.901 131.154C182.407 131.154 186.869 126.713 186.869 121.234C186.869 115.756 182.407 111.315 176.901 111.315C171.396 111.315 166.933 115.756 166.933 121.234C166.933 126.713 171.396 131.154 176.901 131.154Z" fill="#3F3D56"/>
                    </g>
                    <g id="longtick">
                    <path id="Vector_10" d="M180.045 118.607L174.043 118.626L177 69L180.045 118.607Z" fill="#3F3D56"/>
                    </g>
                    <g id="shorttick">
                    <path id="Vector_11" d="M178.974 120.066L175.1 120.061L177 91L178.974 120.066Z" fill="#3F3D56"/>
                    </g>
                    <g id="woman">
                    <path id="Vector_12" d="M222.822 135.263L221.475 137.139C221.475 137.139 215.279 144.378 215.01 140.893C214.74 137.407 219.59 134.995 219.59 134.995L222.284 133.386L222.822 135.263Z" fill="#FFB8B8"/>
                    <path id="Vector_13" d="M261.171 141.594L262.299 143.609C262.299 143.609 266.222 152.279 262.941 151.03C259.66 149.781 259.544 144.387 259.544 144.387L259.236 141.276L261.171 141.594Z" fill="#FFB8B8"/>
                    <path id="Vector_14" d="M255.106 105.871C259.637 105.871 263.31 102.217 263.31 97.7083C263.31 93.1999 259.637 89.5452 255.106 89.5452C250.576 89.5452 246.903 93.1999 246.903 97.7083C246.903 102.217 250.576 105.871 255.106 105.871Z" fill="#2F2E41"/>
                    <path id="Vector_15" d="M254.343 164.752L255.421 171.723V173.867H261.617V171.187C261.617 171.187 261.886 166.361 260.809 165.021C259.731 163.68 254.343 164.752 254.343 164.752Z" fill="#FFB8B8"/>
                    <path id="Vector_16" d="M243.297 164.752L244.375 171.723V173.867H250.571V171.187C250.571 171.187 250.841 166.361 249.763 165.021C248.685 163.68 243.297 164.752 243.297 164.752Z" fill="#FFB8B8"/>
                    <path id="Vector_17" d="M247.467 108.763C247.467 108.763 245.084 110.013 246.712 112.856C248.339 115.7 257.89 145.116 257.89 145.116L263.4 143.56L258.541 124.956L255.759 113.263L247.467 108.763Z" fill="#FFB038"/>
                    <path id="Vector_18" d="M254.208 106.175C257.63 106.175 260.405 103.415 260.405 100.009C260.405 96.6038 257.63 93.8431 254.208 93.8431C250.786 93.8431 248.012 96.6038 248.012 100.009C248.012 103.415 250.786 106.175 254.208 106.175Z" fill="#FFB8B8"/>
                    <path id="Vector_19" d="M257.037 100.947L256.229 113.548L250.571 109.526C250.571 109.526 252.457 102.02 251.918 101.484L257.037 100.947Z" fill="#FFB8B8"/>
                    <path id="Vector_20" d="M257.037 112.475L250.942 107.984C250.942 107.984 248.147 106.845 247.338 108.186C246.53 109.526 242.489 129.365 244.644 133.118C244.644 133.118 256.229 135.531 258.653 134.19L259.731 127.22C259.731 127.22 261.078 122.931 258.923 120.25L257.037 112.475Z" fill="#FFB038"/>
                    <path id="Vector_21" d="M248.955 108.454C248.955 108.454 246.8 106.845 244.914 109.526C243.028 112.207 220.398 133.386 220.398 133.386L224.169 137.676L238.987 125.344L248.416 117.837L248.955 108.454Z" fill="#FFB038"/>
                    <path id="Vector_22" d="M258.788 134.056C258.788 134.056 245.453 131.51 244.106 133.386L243.836 136.335C243.836 136.335 240.873 141.965 242.489 151.08C244.106 160.195 243.028 165.825 243.028 165.825C243.028 165.825 250.302 165.021 255.69 165.825C261.078 166.629 261.886 165.825 261.886 165.825L258.788 134.056Z" fill="#2F2E41"/>
                    <path id="Vector_23" d="M262.156 172.795L254.343 173.063L257.037 193.17C257.037 193.17 254.882 201.749 257.306 202.285C258.992 202.623 260.706 202.803 262.425 202.821C262.425 202.821 264.85 205.234 267.544 204.966C269.333 204.738 271.067 204.193 272.663 203.357C272.663 203.357 273.201 201.749 271.316 201.212C269.43 200.676 264.311 199.068 263.233 193.438L262.156 172.795Z" fill="#2F2E41"/>
                    <path id="Vector_24" d="M251.11 172.795L243.297 173.063L245.991 193.17C245.991 193.17 243.836 201.749 246.261 202.285C247.946 202.623 249.66 202.803 251.379 202.821C251.379 202.821 253.804 205.234 256.498 204.966C258.287 204.738 260.021 204.193 261.617 203.357C261.617 203.357 262.156 201.749 260.27 201.212C258.384 200.676 253.265 199.068 252.188 193.438L251.11 172.795Z" fill="#2F2E41"/>
                    <path id="Vector_25" d="M257.976 92.4945C259.851 92.4945 261.37 90.9822 261.37 89.1166C261.37 87.2511 259.851 85.7388 257.976 85.7388C256.101 85.7388 254.582 87.2511 254.582 89.1166C254.582 90.9822 256.101 92.4945 257.976 92.4945Z" fill="#2F2E41"/>
                    <path id="Vector_26" d="M262.502 87.287C262.502 86.452 262.191 85.6467 261.63 85.0263C261.068 84.4059 260.296 84.0144 259.461 83.9274C259.579 83.9152 259.697 83.9091 259.815 83.9091C260.715 83.9091 261.578 84.265 262.215 84.8985C262.852 85.5319 263.209 86.3911 263.209 87.287C263.209 88.1828 262.852 89.042 262.215 89.6755C261.578 90.3089 260.715 90.6648 259.815 90.6648C259.697 90.6648 259.579 90.6587 259.461 90.6466C260.296 90.5595 261.068 90.168 261.63 89.5476C262.191 88.9273 262.502 88.1219 262.502 87.287Z" fill="#2F2E41"/>
                    <path id="Vector_27" d="M254.152 99.3553C257.277 99.3553 259.81 97.843 259.81 95.9775C259.81 94.112 257.277 92.5996 254.152 92.5996C251.028 92.5996 248.495 94.112 248.495 95.9775C248.495 97.843 251.028 99.3553 254.152 99.3553Z" fill="#2F2E41"/>
                    </g>
                    </g>
                </svg>
            </div>
            <div class="time-show">
                <h1 style="">Time-Collaboration</h1>
                <p class="mt-3" style="margin-bottom: 0;">
                    We spend around  <span>2232 HOURS</span> to complete the task given. <br>
                    Collaboration with <span>Miss Nur Syahira Amira Mohd Azhari</span>
                </p>
            </div>
        </div>
        

    </div>
        
@endsection

