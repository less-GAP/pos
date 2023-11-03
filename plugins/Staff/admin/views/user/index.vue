<script>
function main(props) {
    let {Api, plugin, computed, component, h, compile, ref, reactive, currentRoute, router} = props
    Object.assign(this, props)
    this.prefix = '/staff/user'
    const self = this
    this.tableConfig = {
        params: {include: 'roles'},
        columns: [
            {
                title: 'Username',
                width: 200,
                key: 'username',
                sorter: (a, b) => a.username.localeCompare(b.username),
                sortDirections: ['descend', 'ascend'],
            }
            , {title: 'Name', key: 'full_name'}
            , {title: 'Role', key: 'roles'}
        ],
        itemActions: [
            {
                icon: 'fa fa-eye',
                action: (item, reload) => {
                    router.replace(self.prefix + '/' + item.id)
                }
            },
            {
                label: '',
                icon: 'fa fa-trash',
                class: '!text-red-600',
                confirm: true,
                action(item, reload) {
                    Api.delete(self.prefix + '/' + item.id).then(rs => {
                    }).finally(() => {
                        reload();
                    });
                }
            }
        ]
    }
}
</script>

<template>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>User List</h4>
            </div>
            <div class="page-btn">
                <router-link to="/staff/user/new" class="btn btn-added">
                    <span class="fa fa-plus-circle mr-3"></span>
                    Add
                    User
                </router-link>
            </div>
        </div>
        <DataTable v-bind="tableConfig" :store="$createApiStore(this.prefix +'/list')">

            <template #cellAction[edit]="{item,actionMethod}">
                <a-button
                    type="text"
                    primary
                    @click="actionMethod"
                    v-if="$auth.hasPermission('user.edit')"
                    :icon="h(EditOutlined)"
                    label=""
                    :outline="true"
                >
                </a-button>
            </template>
            <template #cellAction[delete]="{item,actionMethod}">
                <a-popconfirm
                    title="Are you sure delete this user?"
                    ok-text="Yes"
                    cancel-text="No"
                    @confirm="actionMethod"
                >
                    <a-button
                        type="text"
                        v-if="$auth.hasPermission('user.delete')"
                        danger
                        :icon="h(DeleteOutlined)"
                        label=""
                        :outline="true"
                    >
                    </a-button>

                </a-popconfirm>
            </template>
            <template #cell[full_name]="{item,column}">
                <img class="float-left w-10 h-10 rounded-full" :src="item.profile_photo_url"
                     :alt="item.full_name">
                <div class="float-left pl-3">
                    <div class="text-base font-semibold">{{ item.full_name }}</div>
                    <div class="font-normal text-gray-500">{{ item.email }}</div>
                </div>
            </template>
            <template #cell[deleted]="{item,column}">
                <a-switch @change="$eloquentRouter.updateApi(prefix,item.id,{deleted:item.deleted})"
                          checkedValue="active"
                          unCheckedValue="inactive"
                          v-model:checked="item.deleted"/>
            </template>
            <template #cell[roles]="{item,column}">
                &nbsp;
                <div v-for="role in item.roles" :key="role.id">
                    <a-tag>{{ role.name }}</a-tag>
                </div>
            </template>
        </DataTable>
    </div>
</template>
