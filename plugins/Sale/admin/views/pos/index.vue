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
    this.ordersStore = createCacheStore('orders', {})
    this.backToList = function () {
        router.replace(plugin.url('/product'))
    }
    this.selectedDate = new Date()
    this.vuecal = ref()
    this.filter = createCacheStore('pos_filter', {
        view: 'day',
        tab: 'calendar'
    })
    this.addOrderItem = function (item) {
        const exist = self.ordersStore.data[self.filter.data.tab].items.find(exist => {
            return exist.id == item.id
        })
        if (exist) {
            exist.pivot.quantity += 1
        } else {
            self.ordersStore.data[self.filter.data.tab].items.push({
                ...item, pivot: {quantity: 1}

            });
        }
    }
    this.nextDay = function () {
        console.log(999, this.vuecal)
        self.vuecal.value.next()
    }
    this.getTotal = function () {
        let total = 0;
        const exist = self.ordersStore.data[self.filter.data.tab].items.map(item => {
            total += item.pivot.quantity * item.sell_price
        })
        return total
    }
    this.calendar = {
        splits: [{label: 'John', class: 'john'}, {label: 'Kate', class: 'kate'}],
        editable: {title: false, drag: true, resize: true, create: true, delete: true},
        events: []
    }
}</script>

<template>
    <a-space>
        <a-button @click="filter.data.tab ='calendar'" :type="filter.data.tab=='calendar'?'primary':''" shape="round">
            <template #icon>
                <span class="fa fa-calendar mr-3"/>
            </template>
            Lịch dịch vụ
        </a-button>
        <a-button @click="filter.data.tab=index" style="padding-right: 30px"
                  v-for="(tmpOrder,index) in ordersStore.data"
                  :type="filter.data.tab==index?'primary':''"
                  shape="round">
            Hóa đơn {{ index + 1 }}
            <a-popconfirm
                title="Are you sure delete?"
                ok-text="Yes"
                cancel-text="No"
                @confirm="ordersStore.data.splice(index,1)"
            >
                <span style="position: absolute ;right:10px;top:10px" class="fa fa-times"/>

            </a-popconfirm>
        </a-button>
        <a-button @click="ordersStore.data.push({items:[]});filter.data.tab=ordersStore.data.length-1" type="primary"
                  ghost shape="circle">
            <span class="fa fa-plus "/>
        </a-button>
    </a-space>
    <a-card v-if="filter.data.tab=='calendar'" style="margin-top:15px">
        <a-form layout="horizontal" class="clearfix" :model="filter.data">
            <a-space>
                <a-form-item style="width: 250px" label="Vị trí">
                    <ApiSelect mode="multiple" labelKey="name" valueKey="id" url="/model/taxonomy/all"
                               v-model:value="filter.data.places"
                               :params="{'filter[type]':'service-place'}" placeholder="Vị trí"></ApiSelect>
                </a-form-item>
                <a-form-item style="width: 250px" label="Nhân viên">
                    <ApiSelect url="/model/user/all" labelKey="full_name" valueKey="id" placeholder="Nhân viên"
                               v-model:value="filter.data.staff_id"></ApiSelect>
                </a-form-item>
                <a-form-item style="width: 250px" label="Khách Hàng">
                    <a-select
                        v-model:value="filter.data.customer_id"></a-select>
                </a-form-item>
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
        >
            <template #split-label="{ split, view }">
                {{ split.label }}
            </template>
        </Calendar>
    </a-card>
    <div v-else style="margin-top:15px">
        <a-row :gutter="20">
            <a-col :span="8">
                <a-input v-model:value="filter.data.search">
                    <template #prefix>
                        <i class="fa fa-search"></i>
                    </template>
                </a-input>
                <a-tabs :key="filter.data.search">
                    <a-tab-pane key="1" tab="Dịch Vụ">
                        <ApiData url="/model/product/all"
                                 :params="{'filter[type]':'service','filter[search]':filter.data.search,include:'images',limit:5}"
                                 v-slot="{data}">
                            <a-list :data-source="data">
                                <template #renderItem="{ item }">
                                    <a-list-item @click="addOrderItem(item)"
                                                 style="padding:0">
                                        <a-card class="w-full" hoverable>
                                            <a-space>
                                                <a-image
                                                    :preview="false"
                                                    v-if="item.images?.length"
                                                    :preview="{ visible: item.visible }"
                                                    :width="100"
                                                    :src="item.images[0].file_url"
                                                    @click="item.visible = true"
                                                />
                                                <div class=" items-baseline">
                                                    <b> {{ item.name }}</b>
                                                    <p>Thời gian: {{ item.quantity }} {{ item.unit }}</p>
                                                </div>
                                            </a-space>
                                        </a-card>

                                    </a-list-item>
                                </template>
                            </a-list>
                        </ApiData>
                    </a-tab-pane>
                    <a-tab-pane key="2" tab="Sản phẩm">
                        <ApiData url="/model/product/all"
                                 :params="{'filter[type]':'product','filter[search]':filter.data.search,include:'images',limit:5}"
                                 v-slot="{data}">
                            <a-list :data-source="data">
                                <template #renderItem="{ item }">
                                    <a-list-item @click="addOrderItem(item)"
                                                 style="padding:0;border:0;margin-bottom: 15px;width:100%">
                                        <a-card class="w-full" hoverable>
                                            <a-space>
                                                <a-image
                                                    :preview="false"
                                                    v-if="item.images?.length"
                                                    :preview="{ visible: item.visible }"
                                                    :width="100"
                                                    :src="item.images[0].file_url"
                                                    @click="item.visible = true"
                                                />
                                                <div class=" items-baseline">
                                                    <b> {{ item.name }}</b>
                                                    <p>Tồn kho: {{ item.stock }}</p>
                                                </div>
                                            </a-space>
                                        </a-card>

                                    </a-list-item>
                                </template>
                            </a-list>
                        </ApiData>
                    </a-tab-pane>
                </a-tabs>
            </a-col>
            <a-col :span="16">
                <a-list style="max-height: 80vh" :data-source="ordersStore.data[filter.data.tab].items">
                    <template #renderItem="{ item ,index }">
                        <a-list-item
                            style="padding:0;border:0;margin-bottom: 15px;width:100%">
                            <a-card class="w-full !mb-5" hoverable>
                                    <div>
                                        <a-space class=" w-full justify-between">
                                            <a-space>
                                                <b class="mr-5">{{ index + 1 }}. {{ item.name }}</b>

                                                <a-input-number
                                                    :min="1"
                                                    v-model:value="item.pivot.quantity"></a-input-number>
                                                <span>Tổng tiền: </span>
                                                <div class="ml-5">
                                                    {{ $format.formatMoney(item.pivot.quantity * item.sell_price) }}
                                                </div>
                                            </a-space>
                                            <a-popconfirm
                                                title="Are you sure delete?"
                                                ok-text="Yes"
                                                cancel-text="No"
                                                @confirm="ordersStore.data[filter.data.tab].items.splice(index,1)"
                                            >
                                                <a-button danger type="text">
                                                    <i class="fa fa-trash"></i>
                                                </a-button>
                                            </a-popconfirm>
                                        </a-space>
                                        <a-space class="mt-5  items-center">
                                            <div style="width: 100px">
                                                Tư vấn bán:
                                            </div>
                                            <ApiSelect style="width: 200px" v-model:value="item.pivot.sale_id"
                                                       valueKey="id" labelKey="full_name"
                                                       url="/model/user/all" :params="{}"/>
                                        </a-space>
                                        <div v-if="item.type=='service'">
                                            <a-space class="mt-5  items-center">
                                                <div style="width: 100px">
                                                    Làm dịch vụ:
                                                </div>
                                                <ApiSelect class="mr-5" style="width: 200px"
                                                           v-model:value="item.sale_id"
                                                           valueKey="id" labelKey="full_name"
                                                           url="/model/user/all" :params="{}"/>

                                                <a-date-picker :minute-step="15" :show-time="{ format: 'HH:mm' }"
                                                               value-format="HH:mm"
                                                               placeholder="Từ giờ"
                                                               format="HH:mm" picker="time"
                                                               v-model:value="item.pivot.time_from"/>
                                                <a-date-picker :minute-step="15" :show-time="{ format: 'HH:mm' }"
                                                               value-format="HH:mm"
                                                               placeholder="Đến giờ"
                                                               format="HH:mm" picker="time"
                                                               :min="item.pivot.time_from"
                                                               v-model:value="item.pivot.time_to"/>

                                                <ApiSelect style="width:200px" labelKey="name" valueKey="id"
                                                           url="/model/taxonomy/all"
                                                           v-model:value="item.pivot.place"
                                                           :params="{'filter[type]':'service-place'}"
                                                           placeholder="Vị trí"></ApiSelect>
                                            </a-space>
                                            <br>
                                            <br>
                                            <p>Thời gian: {{ item.quantity }} {{ item.unit }}</p>
                                        </div>

                                    </div>
                            </a-card>

                        </a-list-item>
                    </template>
                </a-list>
                <a-divider></a-divider>
                <a-button class="float-right" type="primary">Thanh toán {{ $format.formatMoney(getTotal()) }}</a-button>
            </a-col>
        </a-row>

    </div>

</template>
