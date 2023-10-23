<script>
function main(Api) {
    let test = {a: 1, b: 2};
    console.log(99, Api);
    return {
        test
    }
}
</script>
<template>
    <div class="grid media-min-w-md:grid-cols-4 grid-cols-1 sm:grid-cols-2 gap-x-6">
        <div>
            <div class="dash-widget">
                <div class="dash-widgetimg">
                    <span><img src="@/assets/img/icons/dash1.svg" alt="img"></span>
                </div>
                <div class="dash-widgetcontent">
                    <h5>$<span class="counters" data-count="307144.00">307144</span></h5>
                    <h6>Total Purchase Due aaa
                        {{ viewData }} {{ test }} {{ data }}
                        <router-link to="/">Go to Mike page</router-link>
                    </h6>
                </div>
            </div>
        </div>
        <div>
            <div class="dash-widget dash1">
                <div class="dash-widgetimg">
                    <span><img src="@/assets/img/icons/dash2.svg" alt="img"></span>
                </div>
                <div class="dash-widgetcontent">
                    <h5>$<span class="counters" data-count="4385.00">4385</span></h5>
                    <h6>Total Sales Due</h6>
                </div>
            </div>
        </div>
        <div>
            <div class="dash-widget dash2">
                <div class="dash-widgetimg">
                    <span><img src="@/assets/img/icons/dash3.svg" alt="img"></span>
                </div>
                <div class="dash-widgetcontent">
                    <h5>$<span class="counters" data-count="385656.50">385656.5</span></h5>
                    <h6>Total Sale Amount</h6>
                </div>
            </div>
        </div>
        <div>
            <div class="dash-widget dash3">
                <div class="dash-widgetimg">
                    <span><img src="@/assets/img/icons/dash4.svg" alt="img"></span>
                </div>
                <div class="dash-widgetcontent">
                    <h5>$<span class="counters" data-count="40000.00">40000</span></h5>
                    <h6>Total Sale Amount</h6>
                </div>
            </div>
        </div>
        <div>
            <div class="dash-count">
                <div class="dash-counts">
                    <h4>100</h4>
                    <h5>Customers</h5>
                </div>
                <div class="dash-imgs">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-user">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
            </div>
        </div>
        <div>
            <div class="dash-count das1">
                <div class="dash-counts">
                    <h4>100</h4>
                    <h5>Suppliers</h5>
                </div>
                <div class="dash-imgs">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-user-check">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="8.5" cy="7" r="4"></circle>
                        <polyline points="17 11 19 13 23 9"></polyline>
                    </svg>
                </div>
            </div>
        </div>
        <div>
            <div class="dash-count das2">
                <div class="dash-counts">
                    <h4>100</h4>
                    <h5>Purchase Invoice</h5>
                </div>
                <div class="dash-imgs">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-file-text">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg>
                </div>
            </div>
        </div>
        <div>
            <div class="dash-count das3">
                <div class="dash-counts">
                    <h4>105</h4>
                    <h5>Sales Invoice</h5>
                </div>
                <div class="dash-imgs">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-file">
                        <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                        <polyline points="13 2 13 9 20 9"></polyline>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="md:grid grid-cols-1 media-min-w-md:grid-cols-12 gap-x-6">
        <div class="col-span-7">
            <div class="card flex-auto">
                <div class="card-header !pb-0 flex justify-between items-center">
                    <h5 class="card-title !mb-0">Purchase &amp; Sales</h5>
                    <div class="graph-sets">
                        <ul>
                            <li>
                                <span>Sales</span>
                            </li>
                            <li>
                                <span>Purchase</span>
                            </li>
                        </ul>
                        <div class="dropdown">
                            <button class="btn btn-white btn-sm dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-dropdown-toggle="dropdownChart" aria-expanded="false">
                                2022 <img src="@/assets/img/icons/dropdown.svg" alt="img" class="ml-2">
                            </button>
                            <ul id="dropdownChart" class="hidden dropdown-menu !translate-x-0 !top-9 !left-0"
                                aria-labelledby="dropdownMenuButton"
                                style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(955.52px, 385.28px, 0px);"
                                data-popper-placement="bottom">
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item">2022</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item">2021</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item">2020</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="position: relative;">
                    <div id="sales_charts" style="min-height: 315px;">
                        <div id="apexchartsgon5jiwc" class="apexcharts-canvas apexchartsgon5jiwc apexcharts-theme-light"
                             style="width: 800px; height: 300px;">
                            <svg id="SvgjsSvg1826" width="800" height="300" xmlns="http://www.w3.org/2000/svg"
                                 version="1.1"
                                 xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                 class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                 style="background: transparent;">
                                <foreignObject x="0" y="0" width="800" height="300">
                                    <div class="apexcharts-legend apexcharts-align-center position-right"
                                         xmlns="http://www.w3.org/1999/xhtml"
                                         style="position: absolute; left: auto; top: 60px; right: 5px;">
                                        <div class="apexcharts-legend-series" rel="1" seriesname="Sales"
                                             data:collapsed="false"
                                             style="margin: 2px 5px;"><span class="apexcharts-legend-marker" rel="1"
                                                                            data:collapsed="false"
                                                                            style="background: rgb(40, 199, 111) !important; color: rgb(40, 199, 111); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 2px;"></span><span
                                            class="apexcharts-legend-text" rel="1" i="0" data:default-text="Sales"
                                            data:collapsed="false"
                                            style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Sales</span>
                                        </div>
                                        <div class="apexcharts-legend-series" rel="2" seriesname="Purchase"
                                             data:collapsed="false"
                                             style="margin: 2px 5px;"><span class="apexcharts-legend-marker" rel="2"
                                                                            data:collapsed="false"
                                                                            style="background: rgb(234, 84, 85) !important; color: rgb(234, 84, 85); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 2px;"></span><span
                                            class="apexcharts-legend-text" rel="2" i="1" data:default-text="Purchase"
                                            data:collapsed="false"
                                            style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: Helvetica, Arial, sans-serif;">Purchase</span>
                                        </div>
                                    </div>

                                </foreignObject>
                                <g id="SvgjsG1828" class="apexcharts-inner apexcharts-graphical"
                                   transform="translate(42.88999938964844, 30)">
                                    <defs id="SvgjsDefs1827">
                                        <linearGradient id="SvgjsLinearGradient1832" x1="0" y1="0" x2="0" y2="1">
                                            <stop id="SvgjsStop1833" stop-opacity="0.4"
                                                  stop-color="rgba(216,227,240,0.4)"
                                                  offset="0"></stop>
                                            <stop id="SvgjsStop1834" stop-opacity="0.5"
                                                  stop-color="rgba(190,209,230,0.5)"
                                                  offset="1"></stop>
                                            <stop id="SvgjsStop1835" stop-opacity="0.5"
                                                  stop-color="rgba(190,209,230,0.5)"
                                                  offset="1"></stop>
                                        </linearGradient>
                                        <clipPath id="gridRectMaskgon5jiwc">
                                            <rect id="SvgjsRect1837" width="746.1100006103516"
                                                  height="236.25408067893983" x="-2" y="0"
                                                  rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                                  stroke-dasharray="0"
                                                  fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="gridRectMarkerMaskgon5jiwc">
                                            <rect id="SvgjsRect1838" width="746.1100006103516"
                                                  height="240.25408067893983" x="-2" y="-2"
                                                  rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                                  stroke-dasharray="0"
                                                  fill="#fff"></rect>
                                        </clipPath>
                                    </defs>
                                    <rect id="SvgjsRect1836" width="18.552750015258788" height="236.25408067893983"
                                          x="0" y="0" rx="0"
                                          ry="0" opacity="1" stroke-width="0" stroke-dasharray="3"
                                          fill="url(#SvgjsLinearGradient1832)" class="apexcharts-xcrosshairs"
                                          y2="236.25408067893983"
                                          filter="none" fill-opacity="0.9"></rect>
                                    <g id="SvgjsG1924" class="apexcharts-xaxis" transform="translate(0, 0)">
                                        <g id="SvgjsG1925" class="apexcharts-xaxis-texts-g"
                                           transform="translate(0, -4)">
                                            <text id="SvgjsText1927" font-family="Helvetica, Arial, sans-serif"
                                                  x="46.38187503814697"
                                                  y="265.25408067893983" text-anchor="middle" dominant-baseline="auto"
                                                  font-size="12px"
                                                  font-weight="400" fill="#373d3f"
                                                  class="apexcharts-text apexcharts-xaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1928"> Jan</tspan>
                                                <title> Jan </title></text>
                                            <text id="SvgjsText1930" font-family="Helvetica, Arial, sans-serif"
                                                  x="139.14562511444092"
                                                  y="265.25408067893983" text-anchor="middle" dominant-baseline="auto"
                                                  font-size="12px"
                                                  font-weight="400" fill="#373d3f"
                                                  class="apexcharts-text apexcharts-xaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1931">feb</tspan>
                                                <title>feb</title></text>
                                            <text id="SvgjsText1933" font-family="Helvetica, Arial, sans-serif"
                                                  x="231.90937519073486"
                                                  y="265.25408067893983" text-anchor="middle" dominant-baseline="auto"
                                                  font-size="12px"
                                                  font-weight="400" fill="#373d3f"
                                                  class="apexcharts-text apexcharts-xaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1934">march</tspan>
                                                <title>march</title></text>
                                            <text id="SvgjsText1936" font-family="Helvetica, Arial, sans-serif"
                                                  x="324.6731252670288"
                                                  y="265.25408067893983" text-anchor="middle" dominant-baseline="auto"
                                                  font-size="12px"
                                                  font-weight="400" fill="#373d3f"
                                                  class="apexcharts-text apexcharts-xaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1937">april</tspan>
                                                <title>april</title></text>
                                            <text id="SvgjsText1939" font-family="Helvetica, Arial, sans-serif"
                                                  x="417.43687534332275"
                                                  y="265.25408067893983" text-anchor="middle" dominant-baseline="auto"
                                                  font-size="12px"
                                                  font-weight="400" fill="#373d3f"
                                                  class="apexcharts-text apexcharts-xaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1940">may</tspan>
                                                <title>may</title></text>
                                            <text id="SvgjsText1942" font-family="Helvetica, Arial, sans-serif"
                                                  x="510.2006254196167"
                                                  y="265.25408067893983" text-anchor="middle" dominant-baseline="auto"
                                                  font-size="12px"
                                                  font-weight="400" fill="#373d3f"
                                                  class="apexcharts-text apexcharts-xaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1943">june</tspan>
                                                <title>june</title></text>
                                            <text id="SvgjsText1945" font-family="Helvetica, Arial, sans-serif"
                                                  x="602.9643754959106"
                                                  y="265.25408067893983" text-anchor="middle" dominant-baseline="auto"
                                                  font-size="12px"
                                                  font-weight="400" fill="#373d3f"
                                                  class="apexcharts-text apexcharts-xaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1946">july</tspan>
                                                <title>july</title></text>
                                            <text id="SvgjsText1948" font-family="Helvetica, Arial, sans-serif"
                                                  x="695.7281255722046"
                                                  y="265.25408067893983" text-anchor="middle" dominant-baseline="auto"
                                                  font-size="12px"
                                                  font-weight="400" fill="#373d3f"
                                                  class="apexcharts-text apexcharts-xaxis-label "
                                                  style="font-family: Helvetica, Arial, sans-serif;">
                                                <tspan id="SvgjsTspan1949">auguest</tspan>
                                                <title>auguest</title></text>
                                        </g>
                                        <line id="SvgjsLine1950" x1="0" y1="237.25408067893983" x2="742.1100006103516"
                                              y2="237.25408067893983" stroke="#e0e0e0" stroke-dasharray="0"
                                              stroke-width="1"></line>
                                    </g>
                                    <g id="SvgjsG1965" class="apexcharts-grid">
                                        <g id="SvgjsG1966" class="apexcharts-gridlines-horizontal">
                                            <line id="SvgjsLine1977" x1="0" y1="0" x2="742.1100006103516" y2="0"
                                                  stroke="#e0e0e0"
                                                  stroke-dasharray="0" class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1978" x1="0" y1="47.250816135787964"
                                                  x2="742.1100006103516"
                                                  y2="47.250816135787964" stroke="#e0e0e0" stroke-dasharray="0"
                                                  class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1979" x1="0" y1="94.50163227157593"
                                                  x2="742.1100006103516"
                                                  y2="94.50163227157593" stroke="#e0e0e0" stroke-dasharray="0"
                                                  class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1980" x1="0" y1="141.7524484073639"
                                                  x2="742.1100006103516"
                                                  y2="141.7524484073639" stroke="#e0e0e0" stroke-dasharray="0"
                                                  class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1981" x1="0" y1="189.00326454315186"
                                                  x2="742.1100006103516"
                                                  y2="189.00326454315186" stroke="#e0e0e0" stroke-dasharray="0"
                                                  class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1982" x1="0" y1="236.25408067893983"
                                                  x2="742.1100006103516"
                                                  y2="236.25408067893983" stroke="#e0e0e0" stroke-dasharray="0"
                                                  class="apexcharts-gridline"></line>
                                        </g>
                                        <g id="SvgjsG1967" class="apexcharts-gridlines-vertical"></g>
                                        <line id="SvgjsLine1968" x1="0" y1="237.25408067893983" x2="0"
                                              y2="243.25408067893983"
                                              stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1969" x1="92.76375007629395" y1="237.25408067893983"
                                              x2="92.76375007629395"
                                              y2="243.25408067893983" stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1970" x1="185.5275001525879" y1="237.25408067893983"
                                              x2="185.5275001525879"
                                              y2="243.25408067893983" stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1971" x1="278.29125022888184" y1="237.25408067893983"
                                              x2="278.29125022888184"
                                              y2="243.25408067893983" stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1972" x1="371.0550003051758" y1="237.25408067893983"
                                              x2="371.0550003051758"
                                              y2="243.25408067893983" stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1973" x1="463.8187503814697" y1="237.25408067893983"
                                              x2="463.8187503814697"
                                              y2="243.25408067893983" stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1974" x1="556.5825004577637" y1="237.25408067893983"
                                              x2="556.5825004577637"
                                              y2="243.25408067893983" stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1975" x1="649.3462505340576" y1="237.25408067893983"
                                              x2="649.3462505340576"
                                              y2="243.25408067893983" stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1976" x1="742.1100006103516" y1="237.25408067893983"
                                              x2="742.1100006103516"
                                              y2="243.25408067893983" stroke="#e0e0e0" stroke-dasharray="0"
                                              class="apexcharts-xaxis-tick"></line>
                                        <line id="SvgjsLine1984" x1="0" y1="236.25408067893983" x2="742.1100006103516"
                                              y2="236.25408067893983" stroke="transparent" stroke-dasharray="0"></line>
                                        <line id="SvgjsLine1983" x1="0" y1="1" x2="0" y2="236.25408067893983"
                                              stroke="transparent"
                                              stroke-dasharray="0"></line>
                                    </g>
                                    <g id="SvgjsG1839" class="apexcharts-bar-series apexcharts-plot-series">
                                        <g id="SvgjsG1840" class="apexcharts-series" seriesName="Sales" rel="1"
                                           data:realIndex="0">
                                            <path id="SvgjsPath1842"
                                                  d="M 37.105500030517575 141.7524484073639L 37.105500030517575 67.6392756848653Q 46.38187503814697 58.3629006772359 55.65825004577636 67.6392756848653L 55.65825004577636 67.6392756848653L 55.65825004577636 141.7524484073639L 55.65825004577636 141.7524484073639z"
                                                  fill="rgba(40,199,111,1)" fill-opacity="1" stroke-opacity="1"
                                                  stroke-linecap="square"
                                                  stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area"
                                                  index="0"
                                                  clip-path="url(#gridRectMaskgon5jiwc)"
                                                  pathTo="M 37.105500030517575 141.7524484073639L 37.105500030517575 67.6392756848653Q 46.38187503814697 58.3629006772359 55.65825004577636 67.6392756848653L 55.65825004577636 67.6392756848653L 55.65825004577636 141.7524484073639L 55.65825004577636 141.7524484073639z"
                                                  pathFrom="M 37.105500030517575 141.7524484073639L 37.105500030517575 141.7524484073639L 55.65825004577636 141.7524484073639L 55.65825004577636 141.7524484073639L 55.65825004577636 141.7524484073639L 37.105500030517575 141.7524484073639"
                                                  cy="63.001088181050605" cx="129.86925010681153" j="0" val="50"
                                                  barHeight="78.75136022631328" barWidth="18.552750015258788"></path>
                                            <path id="SvgjsPath1847"
                                                  d="M 129.86925010681153 141.7524484073639L 129.86925010681153 75.51441170749662Q 139.14562511444092 66.23803669986722 148.42200012207033 75.51441170749662L 148.42200012207033 75.51441170749662L 148.42200012207033 141.7524484073639L 148.42200012207033 141.7524484073639z"
                                                  fill="rgba(40,199,111,1)" fill-opacity="1" stroke-opacity="1"
                                                  stroke-linecap="square"
                                                  stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area"
                                                  index="0"
                                                  clip-path="url(#gridRectMaskgon5jiwc)"
                                                  pathTo="M 129.86925010681153 141.7524484073639L 129.86925010681153 75.51441170749662Q 139.14562511444092 66.23803669986722 148.42200012207033 75.51441170749662L 148.42200012207033 75.51441170749662L 148.42200012207033 141.7524484073639L 148.42200012207033 141.7524484073639z"
                                                  pathFrom="M 129.86925010681153 141.7524484073639L 129.86925010681153 141.7524484073639L 148.42200012207033 141.7524484073639L 148.42200012207033 141.7524484073639L 148.42200012207033 141.7524484073639L 129.86925010681153 141.7524484073639"
                                                  cy="70.87622420368193" cx="222.63300018310548" j="1" val="45"
                                                  barHeight="70.87622420368196" barWidth="18.552750015258788"></path>
                                            <path id="SvgjsPath1852"
                                                  d="M 222.63300018310548 141.7524484073639L 222.63300018310548 51.88900363960264Q 231.90937519073486 42.61262863197325 241.18575019836427 51.88900363960264L 241.18575019836427 51.88900363960264L 241.18575019836427 141.7524484073639L 241.18575019836427 141.7524484073639z"
                                                  fill="rgba(40,199,111,1)" fill-opacity="1" stroke-opacity="1"
                                                  stroke-linecap="square"
                                                  stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area"
                                                  index="0"
                                                  clip-path="url(#gridRectMaskgon5jiwc)"
                                                  pathTo="M 222.63300018310548 141.7524484073639L 222.63300018310548 51.88900363960264Q 231.90937519073486 42.61262863197325 241.18575019836427 51.88900363960264L 241.18575019836427 51.88900363960264L 241.18575019836427 141.7524484073639L 241.18575019836427 141.7524484073639z"
                                                  pathFrom="M 222.63300018310548 141.7524484073639L 222.63300018310548 141.7524484073639L 241.18575019836427 141.7524484073639L 241.18575019836427 141.7524484073639L 241.18575019836427 141.7524484073639L 222.63300018310548 141.7524484073639"
                                                  cy="47.25081613578794" cx="315.3967502593994" j="2" val="60"
                                                  barHeight="94.50163227157594" barWidth="18.552750015258788"></path>
                                            <path id="SvgjsPath1857"
                                                  d="M 315.3967502593994 141.7524484073639L 315.3967502593994 36.138731594339994Q 324.6731252670288 26.8623565867106 333.9495002746582 36.138731594339994L 333.9495002746582 36.138731594339994L 333.9495002746582 141.7524484073639L 333.9495002746582 141.7524484073639z"
                                                  fill="rgba(40,199,111,1)" fill-opacity="1" stroke-opacity="1"
                                                  stroke-linecap="square"
                                                  stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area"
                                                  index="0"
                                                  clip-path="url(#gridRectMaskgon5jiwc)"
                                                  pathTo="M 315.3967502593994 141.7524484073639L 315.3967502593994 36.138731594339994Q 324.6731252670288 26.8623565867106 333.9495002746582 36.138731594339994L 333.9495002746582 36.138731594339994L 333.9495002746582 141.7524484073639L 333.9495002746582 141.7524484073639z"
                                                  pathFrom="M 315.3967502593994 141.7524484073639L 315.3967502593994 141.7524484073639L 333.9495002746582 141.7524484073639L 333.9495002746582 141.7524484073639L 333.9495002746582 141.7524484073639L 315.3967502593994 141.7524484073639"
                                                  cy="31.500544090525295" cx="408.16050033569337" j="3" val="70"
                                                  barHeight="110.25190431683859" barWidth="18.552750015258788"></path>
                                            <path id="SvgjsPath1862"
                                                  d="M 408.16050033569337 141.7524484073639L 408.16050033569337 67.6392756848653Q 417.43687534332275 58.3629006772359 426.71325035095214 67.6392756848653L 426.71325035095214 67.6392756848653L 426.71325035095214 141.7524484073639L 426.71325035095214 141.7524484073639z"
                                                  fill="rgba(40,199,111,1)" fill-opacity="1" stroke-opacity="1"
                                                  stroke-linecap="square"
                                                  stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area"
                                                  index="0"
                                                  clip-path="url(#gridRectMaskgon5jiwc)"
                                                  pathTo="M 408.16050033569337 141.7524484073639L 408.16050033569337 67.6392756848653Q 417.43687534332275 58.3629006772359 426.71325035095214 67.6392756848653L 426.71325035095214 67.6392756848653L 426.71325035095214 141.7524484073639L 426.71325035095214 141.7524484073639z"
                                                  pathFrom="M 408.16050033569337 141.7524484073639L 408.16050033569337 141.7524484073639L 426.71325035095214 141.7524484073639L 426.71325035095214 141.7524484073639L 426.71325035095214 141.7524484073639L 408.16050033569337 141.7524484073639"
                                                  cy="63.001088181050605" cx="500.9242504119873" j="4" val="50"
                                                  barHeight="78.75136022631328" barWidth="18.552750015258788"></path>
                                            <path id="SvgjsPath1867"
                                                  d="M 500.9242504119873 141.7524484073639L 500.9242504119873 75.51441170749662Q 510.2006254196167 66.23803669986722 519.4770004272461 75.51441170749662L 519.4770004272461 75.51441170749662L 519.4770004272461 141.7524484073639L 519.4770004272461 141.7524484073639z"
                                                  fill="rgba(40,199,111,1)" fill-opacity="1" stroke-opacity="1"
                                                  stroke-linecap="square"
                                                  stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area"
                                                  index="0"
                                                  clip-path="url(#gridRectMaskgon5jiwc)"
                                                  pathTo="M 500.9242504119873 141.7524484073639L 500.9242504119873 75.51441170749662Q 510.2006254196167 66.23803669986722 519.4770004272461 75.51441170749662L 519.4770004272461 75.51441170749662L 519.4770004272461 141.7524484073639L 519.4770004272461 141.7524484073639z"
                                                  pathFrom="M 500.9242504119873 141.7524484073639L 500.9242504119873 141.7524484073639L 519.4770004272461 141.7524484073639L 519.4770004272461 141.7524484073639L 519.4770004272461 141.7524484073639L 500.9242504119873 141.7524484073639"
                                                  cy="70.87622420368193" cx="593.6880004882812" j="5" val="45"
                                                  barHeight="70.87622420368196" barWidth="18.552750015258788"></path>
                                            <path id="SvgjsPath1872"
                                                  d="M 593.6880004882812 141.7524484073639L 593.6880004882812 51.88900363960264Q 602.9643754959106 42.61262863197325 612.24075050354 51.88900363960264L 612.24075050354 51.88900363960264L 612.24075050354 141.7524484073639L 612.24075050354 141.7524484073639z"
                                                  fill="rgba(40,199,111,1)" fill-opacity="1" stroke-opacity="1"
                                                  stroke-linecap="square"
                                                  stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area"
                                                  index="0"
                                                  clip-path="url(#gridRectMaskgon5jiwc)"
                                                  pathTo="M 593.6880004882812 141.7524484073639L 593.6880004882812 51.88900363960264Q 602.9643754959106 42.61262863197325 612.24075050354 51.88900363960264L 612.24075050354 51.88900363960264L 612.24075050354 141.7524484073639L 612.24075050354 141.7524484073639z"
                                                  pathFrom="M 593.6880004882812 141.7524484073639L 593.6880004882812 141.7524484073639L 612.24075050354 141.7524484073639L 612.24075050354 141.7524484073639L 612.24075050354 141.7524484073639L 593.6880004882812 141.7524484073639"
                                                  cy="47.25081613578794" cx="686.4517505645751" j="6" val="60"
                                                  barHeight="94.50163227157594" barWidth="18.552750015258788"></path>
                                            <path id="SvgjsPath1877"
                                                  d="M 686.4517505645751 141.7524484073639L 686.4517505645751 36.138731594339994Q 695.7281255722046 26.8623565867106 705.0045005798339 36.138731594339994L 705.0045005798339 36.138731594339994L 705.0045005798339 141.7524484073639L 705.0045005798339 141.7524484073639z"
                                                  fill="rgba(40,199,111,1)" fill-opacity="1" stroke-opacity="1"
                                                  stroke-linecap="square"
                                                  stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area"
                                                  index="0"
                                                  clip-path="url(#gridRectMaskgon5jiwc)"
                                                  pathTo="M 686.4517505645751 141.7524484073639L 686.4517505645751 36.138731594339994Q 695.7281255722046 26.8623565867106 705.0045005798339 36.138731594339994L 705.0045005798339 36.138731594339994L 705.0045005798339 141.7524484073639L 705.0045005798339 141.7524484073639z"
                                                  pathFrom="M 686.4517505645751 141.7524484073639L 686.4517505645751 141.7524484073639L 705.0045005798339 141.7524484073639L 705.0045005798339 141.7524484073639L 705.0045005798339 141.7524484073639L 686.4517505645751 141.7524484073639"
                                                  cy="31.500544090525295" cx="779.2155006408691" j="7" val="70"
                                                  barHeight="110.25190431683859" barWidth="18.552750015258788"></path>
                                        </g>
                                        <g id="SvgjsG1882" class="apexcharts-series" seriesName="Purchase" rel="2"
                                           data:realIndex="1">
                                            <path id="SvgjsPath1884"
                                                  d="M 37.105500030517575 141.7524484073639L 37.105500030517575 170.18983219860078Q 46.38187503814697 179.46620720623017 55.65825004577636 170.18983219860078L 55.65825004577636 170.18983219860078L 55.65825004577636 141.7524484073639L 55.65825004577636 141.7524484073639z"
                                                  fill="rgba(234,84,85,1)" fill-opacity="1" stroke-opacity="1"
                                                  stroke-linecap="square"
                                                  stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area"
                                                  index="1"
                                                  clip-path="url(#gridRectMaskgon5jiwc)"
                                                  pathTo="M 37.105500030517575 141.7524484073639L 37.105500030517575 170.18983219860078Q 46.38187503814697 179.46620720623017 55.65825004577636 170.18983219860078L 55.65825004577636 170.18983219860078L 55.65825004577636 141.7524484073639L 55.65825004577636 141.7524484073639z"
                                                  pathFrom="M 37.105500030517575 141.7524484073639L 37.105500030517575 141.7524484073639L 55.65825004577636 141.7524484073639L 55.65825004577636 141.7524484073639L 55.65825004577636 141.7524484073639L 37.105500030517575 141.7524484073639"
                                                  cy="174.82801970241547" cx="129.86925010681153" j="0" val="-21"
                                                  barHeight="-33.07557129505158" barWidth="18.552750015258788"></path>
                                            <path id="SvgjsPath1889"
                                                  d="M 129.86925010681153 141.7524484073639L 129.86925010681153 222.16572994796755Q 139.14562511444092 231.44210495559693 148.42200012207033 222.16572994796755L 148.42200012207033 222.16572994796755L 148.42200012207033 141.7524484073639L 148.42200012207033 141.7524484073639z"
                                                  fill="rgba(234,84,85,1)" fill-opacity="1" stroke-opacity="1"
                                                  stroke-linecap="square"
                                                  stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area"
                                                  index="1"
                                                  clip-path="url(#gridRectMaskgon5jiwc)"
                                                  pathTo="M 129.86925010681153 141.7524484073639L 129.86925010681153 222.16572994796755Q 139.14562511444092 231.44210495559693 148.42200012207033 222.16572994796755L 148.42200012207033 222.16572994796755L 148.42200012207033 141.7524484073639L 148.42200012207033 141.7524484073639z"
                                                  pathFrom="M 129.86925010681153 141.7524484073639L 129.86925010681153 141.7524484073639L 148.42200012207033 141.7524484073639L 148.42200012207033 141.7524484073639L 148.42200012207033 141.7524484073639L 129.86925010681153 141.7524484073639"
                                                  cy="226.80391745178224" cx="222.63300018310548" j="1" val="-54"
                                                  barHeight="-85.05146904441834" barWidth="18.552750015258788"></path>
                                            <path id="SvgjsPath1894"
                                                  d="M 222.63300018310548 141.7524484073639L 222.63300018310548 207.99048510723114Q 231.90937519073486 217.26686011486052 241.18575019836427 207.99048510723114L 241.18575019836427 207.99048510723114L 241.18575019836427 141.7524484073639L 241.18575019836427 141.7524484073639z"
                                                  fill="rgba(234,84,85,1)" fill-opacity="1" stroke-opacity="1"
                                                  stroke-linecap="square"
                                                  stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area"
                                                  index="1"
                                                  clip-path="url(#gridRectMaskgon5jiwc)"
                                                  pathTo="M 222.63300018310548 141.7524484073639L 222.63300018310548 207.99048510723114Q 231.90937519073486 217.26686011486052 241.18575019836427 207.99048510723114L 241.18575019836427 207.99048510723114L 241.18575019836427 141.7524484073639L 241.18575019836427 141.7524484073639z"
                                                  pathFrom="M 222.63300018310548 141.7524484073639L 222.63300018310548 141.7524484073639L 241.18575019836427 141.7524484073639L 241.18575019836427 141.7524484073639L 241.18575019836427 141.7524484073639L 222.63300018310548 141.7524484073639"
                                                  cy="212.62867261104583" cx="315.3967502593994" j="2" val="-45"
                                                  barHeight="-70.87622420368196" barWidth="18.552750015258788"></path>
                                            <path id="SvgjsPath1899"
                                                  d="M 315.3967502593994 141.7524484073639L 315.3967502593994 192.2402130619685Q 324.6731252670288 201.51658806959787 333.9495002746582 192.2402130619685L 333.9495002746582 192.2402130619685L 333.9495002746582 141.7524484073639L 333.9495002746582 141.7524484073639z"
                                                  fill="rgba(234,84,85,1)" fill-opacity="1" stroke-opacity="1"
                                                  stroke-linecap="square"
                                                  stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area"
                                                  index="1"
                                                  clip-path="url(#gridRectMaskgon5jiwc)"
                                                  pathTo="M 315.3967502593994 141.7524484073639L 315.3967502593994 192.2402130619685Q 324.6731252670288 201.51658806959787 333.9495002746582 192.2402130619685L 333.9495002746582 192.2402130619685L 333.9495002746582 141.7524484073639L 333.9495002746582 141.7524484073639z"
                                                  pathFrom="M 315.3967502593994 141.7524484073639L 315.3967502593994 141.7524484073639L 333.9495002746582 141.7524484073639L 333.9495002746582 141.7524484073639L 333.9495002746582 141.7524484073639L 315.3967502593994 141.7524484073639"
                                                  cy="196.87840056578318" cx="408.16050033569337" j="3" val="-35"
                                                  barHeight="-55.125952158419295" barWidth="18.552750015258788"></path>
                                            <path id="SvgjsPath1904"
                                                  d="M 408.16050033569337 141.7524484073639L 408.16050033569337 170.18983219860078Q 417.43687534332275 179.46620720623017 426.71325035095214 170.18983219860078L 426.71325035095214 170.18983219860078L 426.71325035095214 141.7524484073639L 426.71325035095214 141.7524484073639z"
                                                  fill="rgba(234,84,85,1)" fill-opacity="1" stroke-opacity="1"
                                                  stroke-linecap="square"
                                                  stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area"
                                                  index="1"
                                                  clip-path="url(#gridRectMaskgon5jiwc)"
                                                  pathTo="M 408.16050033569337 141.7524484073639L 408.16050033569337 170.18983219860078Q 417.43687534332275 179.46620720623017 426.71325035095214 170.18983219860078L 426.71325035095214 170.18983219860078L 426.71325035095214 141.7524484073639L 426.71325035095214 141.7524484073639z"
                                                  pathFrom="M 408.16050033569337 141.7524484073639L 408.16050033569337 141.7524484073639L 426.71325035095214 141.7524484073639L 426.71325035095214 141.7524484073639L 426.71325035095214 141.7524484073639L 408.16050033569337 141.7524484073639"
                                                  cy="174.82801970241547" cx="500.9242504119873" j="4" val="-21"
                                                  barHeight="-33.07557129505158" barWidth="18.552750015258788"></path>
                                            <path id="SvgjsPath1909"
                                                  d="M 500.9242504119873 141.7524484073639L 500.9242504119873 222.16572994796755Q 510.2006254196167 231.44210495559693 519.4770004272461 222.16572994796755L 519.4770004272461 222.16572994796755L 519.4770004272461 141.7524484073639L 519.4770004272461 141.7524484073639z"
                                                  fill="rgba(234,84,85,1)" fill-opacity="1" stroke-opacity="1"
                                                  stroke-linecap="square"
                                                  stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area"
                                                  index="1"
                                                  clip-path="url(#gridRectMaskgon5jiwc)"
                                                  pathTo="M 500.9242504119873 141.7524484073639L 500.9242504119873 222.16572994796755Q 510.2006254196167 231.44210495559693 519.4770004272461 222.16572994796755L 519.4770004272461 222.16572994796755L 519.4770004272461 141.7524484073639L 519.4770004272461 141.7524484073639z"
                                                  pathFrom="M 500.9242504119873 141.7524484073639L 500.9242504119873 141.7524484073639L 519.4770004272461 141.7524484073639L 519.4770004272461 141.7524484073639L 519.4770004272461 141.7524484073639L 500.9242504119873 141.7524484073639"
                                                  cy="226.80391745178224" cx="593.6880004882812" j="5" val="-54"
                                                  barHeight="-85.05146904441834" barWidth="18.552750015258788"></path>
                                            <path id="SvgjsPath1914"
                                                  d="M 593.6880004882812 141.7524484073639L 593.6880004882812 207.99048510723114Q 602.9643754959106 217.26686011486052 612.24075050354 207.99048510723114L 612.24075050354 207.99048510723114L 612.24075050354 141.7524484073639L 612.24075050354 141.7524484073639z"
                                                  fill="rgba(234,84,85,1)" fill-opacity="1" stroke-opacity="1"
                                                  stroke-linecap="square"
                                                  stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area"
                                                  index="1"
                                                  clip-path="url(#gridRectMaskgon5jiwc)"
                                                  pathTo="M 593.6880004882812 141.7524484073639L 593.6880004882812 207.99048510723114Q 602.9643754959106 217.26686011486052 612.24075050354 207.99048510723114L 612.24075050354 207.99048510723114L 612.24075050354 141.7524484073639L 612.24075050354 141.7524484073639z"
                                                  pathFrom="M 593.6880004882812 141.7524484073639L 593.6880004882812 141.7524484073639L 612.24075050354 141.7524484073639L 612.24075050354 141.7524484073639L 612.24075050354 141.7524484073639L 593.6880004882812 141.7524484073639"
                                                  cy="212.62867261104583" cx="686.4517505645751" j="6" val="-45"
                                                  barHeight="-70.87622420368196" barWidth="18.552750015258788"></path>
                                            <path id="SvgjsPath1919"
                                                  d="M 686.4517505645751 141.7524484073639L 686.4517505645751 192.2402130619685Q 695.7281255722046 201.51658806959787 705.0045005798339 192.2402130619685L 705.0045005798339 192.2402130619685L 705.0045005798339 141.7524484073639L 705.0045005798339 141.7524484073639z"
                                                  fill="rgba(234,84,85,1)" fill-opacity="1" stroke-opacity="1"
                                                  stroke-linecap="square"
                                                  stroke-width="0" stroke-dasharray="0" class="apexcharts-bar-area"
                                                  index="1"
                                                  clip-path="url(#gridRectMaskgon5jiwc)"
                                                  pathTo="M 686.4517505645751 141.7524484073639L 686.4517505645751 192.2402130619685Q 695.7281255722046 201.51658806959787 705.0045005798339 192.2402130619685L 705.0045005798339 192.2402130619685L 705.0045005798339 141.7524484073639L 705.0045005798339 141.7524484073639z"
                                                  pathFrom="M 686.4517505645751 141.7524484073639L 686.4517505645751 141.7524484073639L 705.0045005798339 141.7524484073639L 705.0045005798339 141.7524484073639L 705.0045005798339 141.7524484073639L 686.4517505645751 141.7524484073639"
                                                  cy="196.87840056578318" cx="779.2155006408691" j="7" val="-35"
                                                  barHeight="-55.125952158419295" barWidth="18.552750015258788"></path>
                                        </g>
                                        <g id="SvgjsG1841" class="apexcharts-datalabels" data:realIndex="0">
                                            <g id="SvgjsG1844" class="apexcharts-data-labels" transform="rotate(0)">
                                                <text id="SvgjsText1846" font-family="Helvetica, Arial, sans-serif"
                                                      x="46.38187503814699"
                                                      y="109.09676808439889" text-anchor="middle"
                                                      dominant-baseline="auto" font-size="12px"
                                                      font-weight="600" fill="#ffffff" class="apexcharts-datalabel"
                                                      cx="46.38187503814699"
                                                      cy="109.09676808439889"
                                                      style="font-family: Helvetica, Arial, sans-serif;">50
                                                </text>
                                            </g>
                                            <g id="SvgjsG1849" class="apexcharts-data-labels" transform="rotate(0)">
                                                <text id="SvgjsText1851" font-family="Helvetica, Arial, sans-serif"
                                                      x="139.14562511444092"
                                                      y="113.03433609571456" text-anchor="middle"
                                                      dominant-baseline="auto" font-size="12px"
                                                      font-weight="600" fill="#ffffff" class="apexcharts-datalabel"
                                                      cx="139.14562511444092"
                                                      cy="113.03433609571456"
                                                      style="font-family: Helvetica, Arial, sans-serif;">45
                                                </text>
                                            </g>
                                            <g id="SvgjsG1854" class="apexcharts-data-labels" transform="rotate(0)">
                                                <text id="SvgjsText1856" font-family="Helvetica, Arial, sans-serif"
                                                      x="231.90937519073486"
                                                      y="101.22163206176756" text-anchor="middle"
                                                      dominant-baseline="auto" font-size="12px"
                                                      font-weight="600" fill="#ffffff" class="apexcharts-datalabel"
                                                      cx="231.90937519073486"
                                                      cy="101.22163206176756"
                                                      style="font-family: Helvetica, Arial, sans-serif;">60
                                                </text>
                                            </g>
                                            <g id="SvgjsG1859" class="apexcharts-data-labels" transform="rotate(0)">
                                                <text id="SvgjsText1861" font-family="Helvetica, Arial, sans-serif"
                                                      x="324.6731252670288"
                                                      y="93.34649603913624" text-anchor="middle"
                                                      dominant-baseline="auto" font-size="12px"
                                                      font-weight="600" fill="#ffffff" class="apexcharts-datalabel"
                                                      cx="324.6731252670288"
                                                      cy="93.34649603913624"
                                                      style="font-family: Helvetica, Arial, sans-serif;">70
                                                </text>
                                            </g>
                                            <g id="SvgjsG1864" class="apexcharts-data-labels" transform="rotate(0)">
                                                <text id="SvgjsText1866" font-family="Helvetica, Arial, sans-serif"
                                                      x="417.43687534332275"
                                                      y="109.09676808439889" text-anchor="middle"
                                                      dominant-baseline="auto" font-size="12px"
                                                      font-weight="600" fill="#ffffff" class="apexcharts-datalabel"
                                                      cx="417.43687534332275"
                                                      cy="109.09676808439889"
                                                      style="font-family: Helvetica, Arial, sans-serif;">50
                                                </text>
                                            </g>
                                            <g id="SvgjsG1869" class="apexcharts-data-labels" transform="rotate(0)">
                                                <text id="SvgjsText1871" font-family="Helvetica, Arial, sans-serif"
                                                      x="510.20062541961664"
                                                      y="113.03433609571456" text-anchor="middle"
                                                      dominant-baseline="auto" font-size="12px"
                                                      font-weight="600" fill="#ffffff" class="apexcharts-datalabel"
                                                      cx="510.20062541961664"
                                                      cy="113.03433609571456"
                                                      style="font-family: Helvetica, Arial, sans-serif;">45
                                                </text>
                                            </g>
                                            <g id="SvgjsG1874" class="apexcharts-data-labels" transform="rotate(0)">
                                                <text id="SvgjsText1876" font-family="Helvetica, Arial, sans-serif"
                                                      x="602.9643754959106"
                                                      y="101.22163206176756" text-anchor="middle"
                                                      dominant-baseline="auto" font-size="12px"
                                                      font-weight="600" fill="#ffffff" class="apexcharts-datalabel"
                                                      cx="602.9643754959106"
                                                      cy="101.22163206176756"
                                                      style="font-family: Helvetica, Arial, sans-serif;">60
                                                </text>
                                            </g>
                                            <g id="SvgjsG1879" class="apexcharts-data-labels" transform="rotate(0)">
                                                <text id="SvgjsText1881" font-family="Helvetica, Arial, sans-serif"
                                                      x="695.7281255722046"
                                                      y="93.34649603913624" text-anchor="middle"
                                                      dominant-baseline="auto" font-size="12px"
                                                      font-weight="600" fill="#ffffff" class="apexcharts-datalabel"
                                                      cx="695.7281255722046"
                                                      cy="93.34649603913624"
                                                      style="font-family: Helvetica, Arial, sans-serif;">70
                                                </text>
                                            </g>
                                        </g>
                                        <g id="SvgjsG1883" class="apexcharts-datalabels" data:realIndex="1">
                                            <g id="SvgjsG1886" class="apexcharts-data-labels" transform="rotate(0)">
                                                <text id="SvgjsText1888" font-family="Helvetica, Arial, sans-serif"
                                                      x="46.38187503814699"
                                                      y="165.01023384508133" text-anchor="middle"
                                                      dominant-baseline="auto" font-size="12px"
                                                      font-weight="600" fill="#ffffff" class="apexcharts-datalabel"
                                                      cx="46.38187503814699"
                                                      cy="165.01023384508133"
                                                      style="font-family: Helvetica, Arial, sans-serif;"></text>
                                            </g>
                                            <g id="SvgjsG1891" class="apexcharts-data-labels" transform="rotate(0)">
                                                <text id="SvgjsText1893" font-family="Helvetica, Arial, sans-serif"
                                                      x="139.14562511444092"
                                                      y="190.9981827197647" text-anchor="middle"
                                                      dominant-baseline="auto" font-size="12px"
                                                      font-weight="600" fill="#ffffff" class="apexcharts-datalabel"
                                                      cx="139.14562511444092"
                                                      cy="190.9981827197647"
                                                      style="font-family: Helvetica, Arial, sans-serif;"></text>
                                            </g>
                                            <g id="SvgjsG1896" class="apexcharts-data-labels" transform="rotate(0)">
                                                <text id="SvgjsText1898" font-family="Helvetica, Arial, sans-serif"
                                                      x="231.90937519073486"
                                                      y="183.9105602993965" text-anchor="middle"
                                                      dominant-baseline="auto" font-size="12px"
                                                      font-weight="600" fill="#ffffff" class="apexcharts-datalabel"
                                                      cx="231.90937519073486"
                                                      cy="183.9105602993965"
                                                      style="font-family: Helvetica, Arial, sans-serif;"></text>
                                            </g>
                                            <g id="SvgjsG1901" class="apexcharts-data-labels" transform="rotate(0)">
                                                <text id="SvgjsText1903" font-family="Helvetica, Arial, sans-serif"
                                                      x="324.6731252670288"
                                                      y="176.03542427676518" text-anchor="middle"
                                                      dominant-baseline="auto" font-size="12px"
                                                      font-weight="600" fill="#ffffff" class="apexcharts-datalabel"
                                                      cx="324.6731252670288"
                                                      cy="176.03542427676518"
                                                      style="font-family: Helvetica, Arial, sans-serif;"></text>
                                            </g>
                                            <g id="SvgjsG1906" class="apexcharts-data-labels" transform="rotate(0)">
                                                <text id="SvgjsText1908" font-family="Helvetica, Arial, sans-serif"
                                                      x="417.43687534332275"
                                                      y="165.01023384508133" text-anchor="middle"
                                                      dominant-baseline="auto" font-size="12px"
                                                      font-weight="600" fill="#ffffff" class="apexcharts-datalabel"
                                                      cx="417.43687534332275"
                                                      cy="165.01023384508133"
                                                      style="font-family: Helvetica, Arial, sans-serif;"></text>
                                            </g>
                                            <g id="SvgjsG1911" class="apexcharts-data-labels" transform="rotate(0)">
                                                <text id="SvgjsText1913" font-family="Helvetica, Arial, sans-serif"
                                                      x="510.20062541961664"
                                                      y="190.9981827197647" text-anchor="middle"
                                                      dominant-baseline="auto" font-size="12px"
                                                      font-weight="600" fill="#ffffff" class="apexcharts-datalabel"
                                                      cx="510.20062541961664"
                                                      cy="190.9981827197647"
                                                      style="font-family: Helvetica, Arial, sans-serif;"></text>
                                            </g>
                                            <g id="SvgjsG1916" class="apexcharts-data-labels" transform="rotate(0)">
                                                <text id="SvgjsText1918" font-family="Helvetica, Arial, sans-serif"
                                                      x="602.9643754959106"
                                                      y="183.9105602993965" text-anchor="middle"
                                                      dominant-baseline="auto" font-size="12px"
                                                      font-weight="600" fill="#ffffff" class="apexcharts-datalabel"
                                                      cx="602.9643754959106"
                                                      cy="183.9105602993965"
                                                      style="font-family: Helvetica, Arial, sans-serif;"></text>
                                            </g>
                                            <g id="SvgjsG1921" class="apexcharts-data-labels" transform="rotate(0)">
                                                <text id="SvgjsText1923" font-family="Helvetica, Arial, sans-serif"
                                                      x="695.7281255722046"
                                                      y="176.03542427676518" text-anchor="middle"
                                                      dominant-baseline="auto" font-size="12px"
                                                      font-weight="600" fill="#ffffff" class="apexcharts-datalabel"
                                                      cx="695.7281255722046"
                                                      cy="176.03542427676518"
                                                      style="font-family: Helvetica, Arial, sans-serif;"></text>
                                            </g>
                                        </g>
                                    </g>
                                    <line id="SvgjsLine1985" x1="0" y1="0" x2="742.1100006103516" y2="0"
                                          stroke="#b6b6b6"
                                          stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine1986" x1="0" y1="0" x2="742.1100006103516" y2="0"
                                          stroke-dasharray="0"
                                          stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG1987" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG1988" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG1989" class="apexcharts-point-annotations"></g>
                                </g>
                                <g id="SvgjsG1951" class="apexcharts-yaxis" rel="0"
                                   transform="translate(12.889999389648438, 0)">
                                    <g id="SvgjsG1952" class="apexcharts-yaxis-texts-g">
                                        <text id="SvgjsText1953" font-family="Helvetica, Arial, sans-serif" x="20"
                                              y="31.5"
                                              text-anchor="end" dominant-baseline="auto" font-size="11px"
                                              font-weight="400"
                                              fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label "
                                              style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1954">90</tspan>
                                        </text>
                                        <text id="SvgjsText1955" font-family="Helvetica, Arial, sans-serif" x="20"
                                              y="78.75081613578797"
                                              text-anchor="end" dominant-baseline="auto" font-size="11px"
                                              font-weight="400"
                                              fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label "
                                              style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1956">60</tspan>
                                        </text>
                                        <text id="SvgjsText1957" font-family="Helvetica, Arial, sans-serif" x="20"
                                              y="126.00163227157594" text-anchor="end" dominant-baseline="auto"
                                              font-size="11px"
                                              font-weight="400" fill="#373d3f"
                                              class="apexcharts-text apexcharts-yaxis-label "
                                              style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1958">30</tspan>
                                        </text>
                                        <text id="SvgjsText1959" font-family="Helvetica, Arial, sans-serif" x="20"
                                              y="173.25244840736391" text-anchor="end" dominant-baseline="auto"
                                              font-size="11px"
                                              font-weight="400" fill="#373d3f"
                                              class="apexcharts-text apexcharts-yaxis-label "
                                              style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1960">0</tspan>
                                        </text>
                                        <text id="SvgjsText1961" font-family="Helvetica, Arial, sans-serif" x="20"
                                              y="220.5032645431519"
                                              text-anchor="end" dominant-baseline="auto" font-size="11px"
                                              font-weight="400"
                                              fill="#373d3f" class="apexcharts-text apexcharts-yaxis-label "
                                              style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1962">-30</tspan>
                                        </text>
                                        <text id="SvgjsText1963" font-family="Helvetica, Arial, sans-serif" x="20"
                                              y="267.75408067893983" text-anchor="end" dominant-baseline="auto"
                                              font-size="11px"
                                              font-weight="400" fill="#373d3f"
                                              class="apexcharts-text apexcharts-yaxis-label "
                                              style="font-family: Helvetica, Arial, sans-serif;">
                                            <tspan id="SvgjsTspan1964">-60</tspan>
                                        </text>
                                    </g>
                                </g>
                                <g id="SvgjsG1829" class="apexcharts-annotations"></g>
                            </svg>
                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                <div class="apexcharts-tooltip-title"
                                     style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                    class="apexcharts-tooltip-marker"
                                    style="background-color: rgb(40, 199, 111);"></span>
                                    <div class="apexcharts-tooltip-text"
                                         style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                            class="apexcharts-tooltip-text-label"></span><span
                                            class="apexcharts-tooltip-text-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                            class="apexcharts-tooltip-text-z-label"></span><span
                                            class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                                <div class="apexcharts-tooltip-series-group" style="order: 2;"><span
                                    class="apexcharts-tooltip-marker"
                                    style="background-color: rgb(234, 84, 85);"></span>
                                    <div class="apexcharts-tooltip-text"
                                         style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                            class="apexcharts-tooltip-text-label"></span><span
                                            class="apexcharts-tooltip-text-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                            class="apexcharts-tooltip-text-z-label"></span><span
                                            class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                <div class="apexcharts-yaxistooltip-text"></div>
                            </div>
                            <div class="apexcharts-toolbar" style="top: 0px; right: 3px;">
                                <div class="apexcharts-menu-icon" title="Menu">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="none" d="M0 0h24v24H0V0z"></path>
                                        <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"></path>
                                    </svg>
                                </div>
                                <div class="apexcharts-menu">
                                    <div class="apexcharts-menu-item exportSVG" title="Download SVG">Download SVG</div>
                                    <div class="apexcharts-menu-item exportPNG" title="Download PNG">Download PNG</div>
                                    <div class="apexcharts-menu-item exportCSV" title="Download CSV">Download CSV</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="resize-triggers">
                        <div class="expand-trigger">
                            <div style="width: 841px; height: 356px;"></div>
                        </div>
                        <div class="contract-trigger"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-5">
            <div class="card flex-auto">
                <div class="card-header !pb-0 flex justify-between items-center">
                    <h4 class="card-title !mb-0">Recently Added Products</h4>
                    <div class="dropdown">
                        <a href="javascript:void(0);" data-dropdown-toggle="dropdownPdt" aria-expanded="false"
                           class="dropset">
                            <i class="fa fa-ellipsis-v"></i>
                        </a>
                        <ul id="dropdownPdt" class="hidden dropdown-menu !inset-auto !translate-x-0 !top-9 !right-0"
                            aria-labelledby="dropdownMenuButton"
                            style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(1530.88px, 381.44px, 0px);"
                            data-popper-placement="bottom">
                            <li>
                                <a href="productlist.html" class="dropdown-item">Product List</a>
                            </li>
                            <li>
                                <a href="addproduct.html" class="dropdown-item">Product Add</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-auto dataview">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                            <div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select
                                name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select> entries</label></div>
                            <table class="table datatable dataTable no-footer" id="DataTables_Table_0" role="grid"
                                   aria-describedby="DataTables_Table_0_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1"
                                        aria-sort="ascending" aria-label="Sno: activate to sort column descending"
                                        style="width: 64.92px;">Sno
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1"
                                        aria-label="Products: activate to sort column ascending"
                                        style="width: 215.52px;">Products
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1"
                                        aria-label="Price: activate to sort column ascending" style="width: 77.25px;">
                                        Price
                                    </th>
                                </tr>
                                </thead>
                                <tbody>


                                <tr class="odd">
                                    <td class="sorting_1">1</td>
                                    <td class="productimgname">
                                        <a href="productlist.html" class="product-img">
                                            <img src="@/assets/img/product/product22.jpg" alt="product">
                                        </a>
                                        <a href="productlist.html">Apple Earpods</a>
                                    </td>
                                    <td>$891.2</td>
                                </tr>
                                <tr class="even">
                                    <td class="sorting_1">2</td>
                                    <td class="productimgname">
                                        <a href="productlist.html" class="product-img">
                                            <img src="@/assets/img/product/product23.jpg" alt="product">
                                        </a>
                                        <a href="productlist.html">iPhone 11</a>
                                    </td>
                                    <td>$668.51</td>
                                </tr>
                                <tr class="odd">
                                    <td class="sorting_1">3</td>
                                    <td class="productimgname">
                                        <a href="productlist.html" class="product-img">
                                            <img src="@/assets/img/product/product24.jpg" alt="product">
                                        </a>
                                        <a href="productlist.html">samsung</a>
                                    </td>
                                    <td>$522.29</td>
                                </tr>
                                <tr class="even">
                                    <td class="sorting_1">4</td>
                                    <td class="productimgname">
                                        <a href="productlist.html" class="product-img">
                                            <img src="@/assets/img/product/product6.jpg" alt="product">
                                        </a>
                                        <a href="productlist.html">Macbook Pro</a>
                                    </td>
                                    <td>$291.01</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">
                                Showing 1
                                to 4 of 4 entries
                            </div>
                            <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><a
                                class="paginate_button previous disabled" aria-controls="DataTables_Table_0"
                                data-dt-idx="0"
                                tabindex="-1" id="DataTables_Table_0_previous">Previous</a><span><a
                                class="paginate_button current"
                                aria-controls="DataTables_Table_0"
                                data-dt-idx="1"
                                tabindex="0">1</a></span><a
                                class="paginate_button next disabled" aria-controls="DataTables_Table_0" data-dt-idx="2"
                                tabindex="-1" id="DataTables_Table_0_next">Next</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card !mb-0">
        <div class="card-body">
            <h4 class="card-title">Expired Products</h4>
            <div class="table-responsive dataview">
                <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper no-footer">
                    <div class="dataTables_length" id="DataTables_Table_1_length"><label>Show <select
                        name="DataTables_Table_1_length" aria-controls="DataTables_Table_1" class="">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select> entries</label></div>
                    <table class="table datatable dataTable no-footer" id="DataTables_Table_1" role="grid"
                           aria-describedby="DataTables_Table_1_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1"
                                colspan="1"
                                aria-sort="ascending" aria-label="SNo: activate to sort column descending"
                                style="width: 77.44px;">SNo
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                                aria-label="Product Code: activate to sort column ascending" style="width: 187.53px;">
                                Product Code
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                                aria-label="Product Name: activate to sort column ascending" style="width: 192.94px;">
                                Product Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                                aria-label="Brand Name: activate to sort column ascending" style="width: 171.45px;">
                                Brand Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                                aria-label="Category Name: activate to sort column ascending" style="width: 206.38px;">
                                Category
                                Name
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
                                aria-label="Expiry Date: activate to sort column ascending" style="width: 162.1px;">
                                Expiry Date
                            </th>
                        </tr>
                        </thead>
                        <tbody>


                        <tr class="odd">
                            <td class="sorting_1">1</td>
                            <td><a href="javascript:void(0);">IT0001</a></td>
                            <td class="productimgname">
                                <a class="product-img" href="productlist.html">
                                    <img src="@/assets/img/product/product2.jpg" alt="product">
                                </a>
                                <a href="productlist.html">Orange</a>
                            </td>
                            <td>N/D</td>
                            <td>Fruits</td>
                            <td>12-12-2022</td>
                        </tr>
                        <tr class="even">
                            <td class="sorting_1">2</td>
                            <td><a href="javascript:void(0);">IT0002</a></td>
                            <td class="productimgname">
                                <a class="product-img" href="productlist.html">
                                    <img src="@/assets/img/product/product3.jpg" alt="product">
                                </a>
                                <a href="productlist.html">Pineapple</a>
                            </td>
                            <td>N/D</td>
                            <td>Fruits</td>
                            <td>25-11-2022</td>
                        </tr>
                        <tr class="odd">
                            <td class="sorting_1">3</td>
                            <td><a href="javascript:void(0);">IT0003</a></td>
                            <td class="productimgname">
                                <a class="product-img" href="productlist.html">
                                    <img src="@/assets/img/product/product4.jpg" alt="product">
                                </a>
                                <a href="productlist.html">Stawberry</a>
                            </td>
                            <td>N/D</td>
                            <td>Fruits</td>
                            <td>19-11-2022</td>
                        </tr>
                        <tr class="even">
                            <td class="sorting_1">4</td>
                            <td><a href="javascript:void(0);">IT0004</a></td>
                            <td class="productimgname">
                                <a class="product-img" href="productlist.html">
                                    <img src="@/assets/img/product/product5.jpg" alt="product">
                                </a>
                                <a href="productlist.html">Avocat</a>
                            </td>
                            <td>N/D</td>
                            <td>Fruits</td>
                            <td>20-11-2022</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="dataTables_info" id="DataTables_Table_1_info" role="status" aria-live="polite">Showing 1
                        to 4
                        of 4 entries
                    </div>
                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_1_paginate"><a
                        class="paginate_button previous disabled" aria-controls="DataTables_Table_1" data-dt-idx="0"
                        tabindex="-1" id="DataTables_Table_1_previous">Previous</a><span><a
                        class="paginate_button current"
                        aria-controls="DataTables_Table_1"
                        data-dt-idx="1"
                        tabindex="0">1</a></span><a
                        class="paginate_button next disabled" aria-controls="DataTables_Table_1" data-dt-idx="2"
                        tabindex="-1"
                        id="DataTables_Table_1_next">Next</a></div>
                </div>
            </div>
        </div>
    </div>
</template>
