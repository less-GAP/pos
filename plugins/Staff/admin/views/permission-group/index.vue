<script>
function main(props) {
    let {Api, plugin, computed, component, h, compile, ref, reactive, currentRoute, router} = props
    Object.assign(this, props)
    const prefix = this.prefix = '/staff/permission-group'
    const routePath = this.routePath = this.prefix
    const itemActions = [
        {
            label: 'Edit',
            class: '!pr-[10px] !pl-[10px]',
            action(item, reload) {
                //showEditUser({}, reload)
                router.push(prefix + '/' + item.id)
            }
        },
        {
            label: 'Delete',
            class: '!pr-[10px] !pl-[10px] font-medium !text-red-600 !dark:text-red-500 hover:underline',
            confirm: true,
            action(item, reload) {
                Api.delete(prefix + '/' + item.id).then(rs => {
                }).finally(() => {
                    reload();
                });
            }
        }
    ]
    const listActions = [
        {
            label: 'Add',
            action(reload) {
                //showEditUser({}, reload)
                router.push(routePath + '/new')
            }
        }
    ]
    const columns = [
        {
            title: 'Group Name',
            key: 'name',

        },

        {
            title: 'Created at',
            key: 'created_at',
            width: 200
        },
    ]
    this.tableConfig = {
        columns,
        listActions,
        itemActions
    }
}
</script>
<template>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Permission Group</h4>
                <h6>Manage your group</h6>
            </div>
            <div class="page-btn">
                <router-link to="/staff/permission-group/new" class="btn btn-added">
                    <span class="fa fa-plus-circle mr-3"></span>
                    Add
                    New
                </router-link>
            </div>
        </div>
        <DataTable @register="registerTable" v-bind="tableConfig" :store="$createApiStore(this.prefix+'/list')">
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
                <a-switch @change="$eloquentRouter.updateApi(prefix,item.id,{status:item.status})" checkedValue="active"
                          unCheckedValue="inactive"
                          v-model:checked="item.status"/>
            </template>

        </DataTable>
    </div>
</template>
