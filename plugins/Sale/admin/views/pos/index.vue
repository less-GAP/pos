<script>

function main(props) {
    let {
        Api,
        plugin,
        computed,
        h,
        compile,
        ref,
        reactive,
        currentRoute,
        router,
        createCacheStore,
        createApiStore,
        modelManager
    } = props;
    const self = this;
    Object.assign(this, props);
    this.store = modelManager.model('product').find(currentRoute.value.params.id, {include: 'images'})
    this.ordersStore = createCacheStore('orders', [])
    this.backToList = function () {
        router.replace(plugin.url('/product'))
    }
    this.selectedDate = new Date()
    this.vuecal = ref()
    this.filter = createCacheStore('pos_filter', {
        view: 'day'
    })
    this.nextDay = function () {
        console.log(999, this.vuecal)
        self.vuecal.value.next()
    }
    this.calendar = {
        splits: [{label: 'John', class: 'john'}, {label: 'Kate', class: 'kate'}],
        editable: {title: false, drag: true, resize: true, create: true, delete: true},
        events: []
    }
}</script>

<template>
    <a-space>
        <a-button type="primary" shape="round">
            <template #icon>
                <span class="fa fa-calendar mr-3"/>
            </template>
            Lịch dịch vụ
        </a-button>
        <a-button style="padding-right: 30px" v-for="(tmpOrder,index) in ordersStore.data" type="primary" ghost
                  shape="round">
            Hóa đơn {{ index + 1 }}
            <a-popconfirm
                title="Are you sure delete?"
                ok-text="Yes"
                cancel-text="No"
                @confirm="ordersStore.data.splice(index,1)"
            >
                <span style="position: absolute ;right:10px;top:10px" class="fa fa-times-circle-o"/>

            </a-popconfirm>
        </a-button>
        <a-button @click="ordersStore.data.push({})" type="primary" ghost shape="circle">
            <template #icon>
                <span class="fa fa-plus "/>
            </template>
        </a-button>
    </a-space>
    <a-card style="margin-top:15px">
        <a-form class="clearfix" :model="filter.data">

            <a-space>
                <a-select placeholder="Vị trí" style="width:200px" v-model:value="filter.data.place"></a-select>
                <a-select placeholder="Nhân viên" style="width:200px" v-model:value="filter.data.place"></a-select>
            </a-space>
            <a-space class="float-right">
                <a-select v-model:value="filter.data.view">
                    <a-select-option value="day">Ngày</a-select-option>
                    <a-select-option value="week">Tuần</a-select-option>
                    <a-select-option value="month">Tháng</a-select-option>
                </a-select>
                <a-button type="primary">
                    <template #icon>
                        <span class="fa fa-plus mr-3"></span>
                    </template>
                    Thêm lịch
                </a-button>
            </a-space>
        </a-form>
        <Calendar class="mt-3" hide-weekends
                  ref="vuecal"
                  :selected-date="selectedDate"
                  :time-from="8 * 60"
                  :time-to="19 * 60"
                  :split-days="calendar.splits"
                  sticky-split-labels
                  :active-view="filter.data.view"
                  hide-view-selector
                  hide-title-bar_
                  :editable-events="calendar.editable"
                  :on-event-click="onEventClick"
                  :events="calendar.events"
                  @cell-focus="selectedDate = $event.date || $event"
                  style="height: 800px">
            <template #split-label="{ split, view }">
                {{ split.label }}
            </template>
        </Calendar>
    </a-card>

</template>
