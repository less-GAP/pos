<script setup>
import {computed, ref, onMounted} from "vue";
import {useMainStore} from "@/stores/main";
import {
  mdiAccountMultiple,
  mdiCartOutline,
  mdiChartTimelineVariant,
} from "@mdi/js";
import * as chartConfig from "@/components/Charts/chart.config.js";
import SectionMain from "@/components/SectionMain.vue";
import CardBoxWidget from "@/components/CardBoxWidget.vue";
import Calendar from "@/components/Calendar.vue";
import CardBoxTransaction from "@/components/CardBoxTransaction.vue";
import CardBoxClient from "@/components/CardBoxClient.vue";
import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
import SectionTitleLineWithButton from "@/components/SectionTitleLineWithButton.vue";

const chartData = ref(null);

const fillChartData = () => {
  chartData.value = chartConfig.sampleChartData();
};

onMounted(() => {
  fillChartData();
});

const mainStore = useMainStore();

const clientBarItems = computed(() => mainStore.clients.slice(0, 4));

const transactionBarItems = computed(() => mainStore.history);
</script>

<template>
  <LayoutAuthenticated>
    <h1 class="text-2xl">Kết quả bán hàng hôm nay</h1>
    <a-row>
      <a-col :span="12">
        <a-statistic title="Active Users" :value="112893" style="margin-right: 50px" />
      </a-col>
      <a-col :span="12">
        <a-statistic title="Account Balance (CNY)" :precision="2" :value="112893" />
      </a-col>
    </a-row>
  </LayoutAuthenticated>
</template>
<style type="text/css">

.apexcharts-legend {
  display: flex;
  overflow: auto;
  padding: 0 10px;
}

.apexcharts-legend.position-bottom, .apexcharts-legend.position-top {
  flex-wrap: wrap
}

.apexcharts-legend.position-right, .apexcharts-legend.position-left {
  flex-direction: column;
  bottom: 0;
}

.apexcharts-legend.position-bottom.apexcharts-align-left, .apexcharts-legend.position-top.apexcharts-align-left, .apexcharts-legend.position-right, .apexcharts-legend.position-left {
  justify-content: flex-start;
}

.apexcharts-legend.position-bottom.apexcharts-align-center, .apexcharts-legend.position-top.apexcharts-align-center {
  justify-content: center;
}

.apexcharts-legend.position-bottom.apexcharts-align-right, .apexcharts-legend.position-top.apexcharts-align-right {
  justify-content: flex-end;
}

.apexcharts-legend-series {
  cursor: pointer;
  line-height: normal;
}

.apexcharts-legend.position-bottom .apexcharts-legend-series, .apexcharts-legend.position-top .apexcharts-legend-series {
  display: flex;
  align-items: center;
}

.apexcharts-legend-text {
  position: relative;
  font-size: 14px;
}

.apexcharts-legend-text *, .apexcharts-legend-marker * {
  pointer-events: none;
}

.apexcharts-legend-marker {
  position: relative;
  display: inline-block;
  cursor: pointer;
  margin-right: 3px;
  border-style: solid;
}

.apexcharts-legend.apexcharts-align-right .apexcharts-legend-series, .apexcharts-legend.apexcharts-align-left .apexcharts-legend-series {
  display: inline-block;
}

.apexcharts-legend-series.apexcharts-no-click {
  cursor: auto;
}

.apexcharts-legend .apexcharts-hidden-zero-series, .apexcharts-legend .apexcharts-hidden-null-series {
  display: none !important;
}

.apexcharts-inactive-legend {
  opacity: 0.45;
}</style>
