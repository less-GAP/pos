<script>function main(props) {
    let {Api, plugin, computed, h, compile, ref, reactive, currentRoute, modelManager, router, unref, emit} = props;
    const self = this;
    Object.assign(this, props);

    this.formState = reactive({})
    this.submit = async function () {
        const result = await modelManager.model('brand').createApi(self.formState);
        Object.assign(self.formState, {})
        setTimeout(() => {
            emit('created', result.data.result)
        }, 100)
    }
}</script>

<template>

    <a-form class="w-full h-full " layout="vertical" v-bind="$config.formConfig"
            ref="formRef"
            :model="formState"
            @finish="submit">

        <a-form-item :rules="[{ required: true }]" label="Brand Name" class="form-group">
            <a-input v-model:value="formState.name" type="text"></a-input>
        </a-form-item>

        <div class="col-span-2">
            <a-button type="primary" html-type="submit" class="btn btn-submit mr-2">Submit
            </a-button>
            <a-button @click="emit('close')">Cancel</a-button>
        </div>
    </a-form>
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
