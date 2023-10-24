<script>
function main(props) {
    let {Api, plugin, computed, component, h, compile, ref, reactive, currentRoute, router} = props
    Object.assign(this, props)
    this.prefix = '/staff/permission'
    this.routePath = this.prefix
    const self = this
    const itemActions = [
        {
            label: 'Edit',
            class: '!pr-[10px] !pl-[10px]',
            action: (item, reload) => {
                //showEditUser({}, reload)
                router.push(self.routePath + '/' + item.id)
            }
        },

        {
            label: 'Delete',
            class: '!pr-[10px] !pl-[10px] font-medium !text-red-600 !dark:text-red-500 hover:underline',
            confirm: true,
            action(item, reload) {
                Api.delete(self.prefix + '/' + item.id).then(rs => {
                }).finally(() => {
                    reload();
                });
            }
        }
    ]

    const columns = [
        {
            title: 'Group',
            key: 'group.name',
        },
        {
            title: 'Name',
            key: 'name',

        },

        {
            title: 'Description',
            key: 'description',

        },
        {
            title: 'Status',
            key: 'status',
            width: 100
        },
        {
            title: 'Created at',
            key: 'created_at',
            width: 200
        },
    ]
    this.tableConfig = {
        columns,
        itemActions
    }
}
</script>
<template>

    <DataTable v-bind="tableConfig" :store="$createApiStore(prefix+'/list',{params:{include:'group'}})">
        <template #lineSearch="{reload,filter,toggleSearch,loading}">
            <a-form-item label="Group">
                <ApiSelect @change="reload" class="!w-[200px]" url="/staff/permission-group/all" labelKey="name"
                           valueKey="id"
                           v-model:value="filter.group_id"></ApiSelect>
            </a-form-item>
        </template>
        <template #cellAction[delete]="{item,actionMethod}">
            <a-popconfirm
                title="Bạn muốn xóa sản phẩm này?"
                ok-text="Yes"
                cancel-text="No"
                @confirm="actionMethod"
            >
                <a-button
                    type="text"
                    danger
                    :icon="h(DeleteOutlined)"
                    label=""
                    :outline="true"
                >
                </a-button>
            </a-popconfirm>
        </template>
        <template #cellAction[edit]="{item,actionMethod}">
            <a-button
                class="mr-5"
                type="text"
                :icon="h(FormOutlined)"
                label=""
                :outline="true"
                @click="actionMethod"
            >
            </a-button>
        </template>
        <template #cell[image]="{item,column}">
            <a-image height="50px" class="w-20 h-auto" :src="item.image"
                     :alt="item.name"/>
        </template>

        <template #cell[status]="{item,column}">
            <a-switch @change="updateApi(item.id,{status:item.status})" checkedValue="active" unCheckedValue="inactive"
                      v-model:checked="item.status"/>
        </template>

    </DataTable>

    <router-view></router-view>

</template>
