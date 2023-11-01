<script>function main(props) {
    let {Api, plugin, computed, h, compile, ref, reactive, currentRoute, router} = props;
    const self = this;
    Object.assign(this, props);
    this.closeDetail = function () {
        router.replace('/sales/order')
    }
}</script>

<template>

    <ApiStore :url="'/sales/order/'+plugin.route.params.id" :params="{include:'customer,products'}">
        <template #default="{store}">
            <div class="content" data-select2-id="15">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Create Sales Return</h4>
                        <h6>Add/Update Sales Return</h6>
                    </div>
                </div>
                <div class="card" data-select2-id="14">
                    <div class="card-body" data-select2-id="13">
                        <div class="sm:grid sm:grid-cols-2 lg:grid-cols-3 gap-x-6" data-select2-id="12">
                            <div data-select2-id="11">
                                <div class="form-group" data-select2-id="10">
                                    <label>Customer Name</label>
                                    <div class="sm:grid sm:grid-cols-12 lg:grid-cols-12" data-select2-id="9">
                                        <div class="sm:col-span-10 lg:col-span-10 sm:mr-3" data-select2-id="8">
                                            <ApiSelect valueKey="id" labelKey="name"
                                                       v-model:value="store.customer_id" url="sales/customer/all">

                                            </ApiSelect>
                                        </div>
                                        <div class="sm:col-span-2 lg:col-span-2 !pl-0">
                                            <div class="add-icon">
                                                <a href="javascript:void(0);"><img
                                                    :src="plugin?.assets('/img/icons/plus1.svg')"
                                                    alt="img"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label>Quotation Date</label>
                                    <div class="datepicker input-groupicon">
                                        <input type="text" placeholder="DD-MM-YYYY"
                                               class="datetimepicker form-icon-trailing">

                                        <button id="datepicker-toggle-611142" type="button"
                                                class="datepicker-toggle-button"
                                                data-mdb-toggle="datepicker">
                                            <i class="far fa-calendar datepicker-toggle-icon"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label>Reference No.</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="sm:col-span-2 lg:col-span-3">
                                <div class="form-group">
                                    <label>Product</label>
                                    <div class="input-groupicon">
                                        <input type="text" placeholder="Scan/Search Product by code and select...">
                                        <div class="addonset ">
                                            <img :src="plugin?.assets('/img/icons/scanners.svg')" alt="img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Net Unit Price($)</th>
                                        <th>Stock</th>
                                        <th>QTY</th>
                                        <th>Discount($)</th>
                                        <th>Tax %</th>
                                        <th>Subtotal ($)</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="productimgname">
                                            <a class="product-img">
                                                <img :src="plugin?.assets('/img/product/product7.jpg')" alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Apple Earpods</a>
                                        </td>
                                        <td>150</td>
                                        <td>500</td>
                                        <td>500</td>
                                        <td>100</td>
                                        <td>50</td>
                                        <td>250</td>
                                        <td>
                                            <a class="delete-set"><img :src="plugin?.assets('/img/icons/delete.svg')"
                                                                       alt="svg"></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="productimgname">
                                            <a class="product-img">
                                                <img :src="plugin?.assets('/img/product/product6.jpg')" alt="product">
                                            </a>
                                            <a href="javascript:void(0);">Macbook Pro</a>
                                        </td>
                                        <td>150</td>
                                        <td>500</td>
                                        <td>500</td>
                                        <td>100</td>
                                        <td>50</td>
                                        <td>250</td>
                                        <td>
                                            <a class="delete-set"><img :src="plugin?.assets('/img/icons/delete.svg')"
                                                                       alt="svg"></a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="sm:grid sm:grid-cols-6 lg:grid-cols-2 gap-x-6">
                            <div class="lg:col-span-2 md:float-right">
                                <div class="total-order">
                                    <ul>
                                        <li>
                                            <h4>Order Tax</h4>
                                            <h5>$ 0.00 (0.00%)</h5>
                                        </li>
                                        <li>
                                            <h4>Discount </h4>
                                            <h5>$ 0.00</h5>
                                        </li>
                                        <li>
                                            <h4>Shipping</h4>
                                            <h5>$ 0.00</h5>
                                        </li>
                                        <li class="total">
                                            <h4>Grand Total</h4>
                                            <h5>$ 0.00</h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="sm:grid sm:grid-cols-6 lg:grid-cols-4 gap-x-6">
                            <div>
                                <div class="form-group">
                                    <label>Order Tax</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label>Discount</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label>Shipping</label>
                                    <input type="text">
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="select select2-hidden-accessible" data-select2-id="4"
                                            tabindex="-1"
                                            aria-hidden="true">
                                        <option data-select2-id="6">Choose Status</option>
                                        <option>Completed</option>
                                        <option>Inprogress</option>
                                    </select><span class="select2 select2-container select2-container--default"
                                                   dir="ltr"
                                                   data-select2-id="5" style="width: 100%;"><span
                                    class="selection"><span
                                    class="select2-selection select2-selection--single" role="combobox"
                                    aria-haspopup="true"
                                    aria-expanded="false" tabindex="0" aria-disabled="false"
                                    aria-labelledby="select2-wcmy-container"><span
                                    class="select2-selection__rendered"
                                    id="select2-wcmy-container"
                                    role="textbox" aria-readonly="true"
                                    title="Choose Status">Choose Status</span><span
                                    class="select2-selection__arrow" role="presentation"><b
                                    role="presentation"></b></span></span></span><span
                                    class="dropdown-wrapper" aria-hidden="true"></span></span>
                                </div>
                            </div>
                            <div class="sm:col-span-6 lg:col-span-4">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="sm:col-span-6 lg:col-span-4">
                                <a :loading="store.loading" @click="store.submitUpdate()"
                                   class="btn btn-submit mr-2">Submit
                                </a>
                                <a href="salesreturnlist.html" class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </template>

    </ApiStore>
</template>

<style>
.ant-input {
    border-color: #d9d9d9 !important;
    border-radius: 5px !important;
}

.ant-modal-wrap {
    z-index: 100001 !important;
}

.ant-form-item {
    margin-bottom: 0;
}

.ant-drawer-body {
    padding: 0 !important
}
</style>
