<script setup>
import {getCurrentInstance, inject, reactive, ref} from "vue";
import {UseEloquentRouter} from "@/utils/UseEloquentRouter";
const { proxy } = getCurrentInstance();
const prefix = 'sales-order'
const {
  getDetailApi,
  updateApi
} = UseEloquentRouter(prefix, {
  include: 'products,customer'
})
const formState = reactive({});
const loading = ref(false);
const fetch = async function () {
  loading.value = true;
  const id = proxy.$route.params.id;
  if (id > 0) {
    loading.value = true
    const value = await getDetailApi(id)
    Object.assign(formState, value.data)
    loading.value = false
  }
  loading.value = false
}
fetch();

</script>

<template>
    <div class="content">
      <div class="page-header">
        <div class="page-title">
          <h4>Sale Details</h4>
          <h6>View sale details</h6>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <div class="card-sales-split">
            <h2>Sale Detail : SL0101</h2>
            <ul>
              <li>
                <a href="javascript:void(0);"><img src="@/assets/img/icons/edit.svg" alt="img"></a>
              </li>
              <li>
                <a href="javascript:void(0);"><img src="@/assets/img/icons/pdf.svg" alt="img"></a>
              </li>
              <li>
                <a href="javascript:void(0);"><img src="@/assets/img/icons/excel.svg" alt="img"></a>
              </li>
              <li>
                <a href="javascript:void(0);"><img src="@/assets/img/icons/printer.svg" alt="img"></a>
              </li>
            </ul>
          </div>
          <div class="invoice-box table-height"
               style="max-width: 1600px;width:100%;overflow: auto;margin:15px auto;padding: 0;font-size: 14px;line-height: 24px;color: #555;">
            <table cellpadding="0" cellspacing="0" style="width: 100%;line-height: inherit;text-align: left;">
              <tbody>
              <tr class="top">
                <td colspan="6" style="padding: 5px;vertical-align: top;">
                  <table style="width: 100%;line-height: inherit;text-align: left;">
                    <tbody>
                    <tr>
                      <td style="padding:5px;vertical-align:top;text-align:left;padding-bottom:20px">
                        <font style="vertical-align: inherit;margin-bottom:25px;"><font
                          style="vertical-align: inherit;font-size:14px;color:#7367F0;font-weight:600;line-height: 35px; ">Customer
                          Info</font></font><br>
                        <font style="vertical-align: inherit;"><font
                          style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;">
                          walk-in-customer</font></font><br>
                        <font style="vertical-align: inherit;"><font
                          style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;">
                          walk-in-customer@example.com</font></font><br>
                        <font style="vertical-align: inherit;"><font
                          style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> 123456780</font></font><br>
                        <font style="vertical-align: inherit;"><font
                          style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> N45 ,
                          Dhaka</font></font><br>
                      </td>
                      <td style="padding:5px;vertical-align:top;text-align:left;padding-bottom:20px">
                        <font style="vertical-align: inherit;margin-bottom:25px;"><font
                          style="vertical-align: inherit;font-size:14px;color:#7367F0;font-weight:600;line-height: 35px; ">Company
                          Info</font></font><br>
                        <font style="vertical-align: inherit;"><font
                          style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;">
                          DGT </font></font><br>
                        <font style="vertical-align: inherit;"><font
                          style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;">
                          admin@example.com</font></font><br>
                        <font style="vertical-align: inherit;"><font
                          style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;">6315996770</font></font><br>
                        <font style="vertical-align: inherit;"><font
                          style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> 3618 Abia Martin
                          Drive</font></font><br>
                      </td>
                      <td style="padding:5px;vertical-align:top;text-align:left;padding-bottom:20px">
                        <font style="vertical-align: inherit;margin-bottom:25px;"><font
                          style="vertical-align: inherit;font-size:14px;color:#7367F0;font-weight:600;line-height: 35px; ">Invoice
                          Info</font></font><br>
                        <font style="vertical-align: inherit;"><font
                          style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;">
                          Reference </font></font><br>
                        <font style="vertical-align: inherit;"><font
                          style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> Payment
                          Status</font></font><br>
                        <font style="vertical-align: inherit;"><font
                          style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;">
                          Status</font></font><br>
                      </td>
                      <td style="padding:5px;vertical-align:top;text-align:right;padding-bottom:20px">
                        <font style="vertical-align: inherit;margin-bottom:25px;"><font
                          style="vertical-align: inherit;font-size:14px;color:#7367F0;font-weight:600;line-height: 35px; ">&nbsp;</font></font><br>
                        <font style="vertical-align: inherit;"><font
                          style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;">SL0101 </font></font><br>
                        <font style="vertical-align: inherit;"><font
                          style="vertical-align: inherit;font-size: 14px;color:#2E7D32;font-weight: 400;">
                          Paid</font></font><br>
                        <font style="vertical-align: inherit;"><font
                          style="vertical-align: inherit;font-size: 14px;color:#2E7D32;font-weight: 400;">
                          Completed</font></font><br>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
              <tr class="heading " style="background: #F3F2F7;">
                <td
                  style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
                  Product Name
                </td>
                <td
                  style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
                  QTY
                </td>
                <td
                  style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
                  Price
                </td>
                <td
                  style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
                  Discount
                </td>
                <td
                  style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
                  TAX
                </td>
                <td
                  style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
                  Subtotal
                </td>
              </tr>
              <tr v-for="product in formState.products" :key="product.id"  class="details" style="border-bottom:1px solid #E9ECEF ;">
                <td style="padding: 10px;vertical-align: top; display: flex;align-items: center;">
                  <img src="@/assets/img/product/product1.jpg" alt="img" class="mr-2" style="width:40px;height:40px;">
                  {{product.name}}
                </td>
                <td style="padding: 10px;vertical-align: top; ">
                  {{product.quantity}}
                </td>
                <td style="padding: 10px;vertical-align: top; ">
                  {{product.total_price}}

                </td>
                <td style="padding: 10px;vertical-align: top; ">
                  {{product.total_discount}}
                </td>
                <td style="padding: 10px;vertical-align: top; ">
                  {{product.tax}}
                </td>
                <td style="padding: 10px;vertical-align: top; ">
                  {{product.sub_total}}
                </td>
              </tr>
              </tbody>
            </table>
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
                <select class="select select2-hidden-accessible" data-select2-id="1" tabindex="-1" aria-hidden="true">
                  <option data-select2-id="3">Choose Status</option>
                  <option>Completed</option>
                  <option>Inprogress</option>
                </select><span class="select2 select2-container select2-container--default" dir="ltr"
                               data-select2-id="2" style="width: 100%;"><span class="selection"><span
                class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true"
                aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-ox03-container"><span
                class="select2-selection__rendered" id="select2-ox03-container" role="textbox" aria-readonly="true"
                title="Choose Status">Choose Status</span><span class="select2-selection__arrow" role="presentation"><b
                role="presentation"></b></span></span></span><span class="dropdown-wrapper"
                                                                   aria-hidden="true"></span></span>
              </div>
            </div>
          </div>
          <div class="sm:grid sm:grid-cols-2 gap-x-6">
            <div>
              <div class="total-order w-full max-widthauto m-auto mb-4">
                <ul>
                  <li>
                    <h4>Order Tax</h4>
                    <h5>$ 0.00 (0.00%)</h5>
                  </li>
                  <li>
                    <h4>Discount </h4>
                    <h5>$ 0.00</h5>
                  </li>
                </ul>
              </div>
            </div>
            <div>
              <div class="total-order w-full max-widthauto m-auto mb-4">
                <ul>
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
          <div>
            <a href="javascript:void(0);" class="btn btn-submit mr-2">Update</a>
            <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
          </div>
        </div>
      </div>
    </div>
</template>
