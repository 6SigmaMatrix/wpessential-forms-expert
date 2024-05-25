<template>
	<div v-loading="page_def_loader" class="wpe-subscribers-wrapper">
		<div class="topbar">
			<h1>Subscribers</h1>
			<el-button :icon="EditPen" round type="primary">Add New</el-button>
		</div>
		<div class="body">
			<el-table v-if="1 <= subscribers.length || 1 <= subscribers.length" :data="subscribers" :lazy="true" class="subscribers" style="width: 100%">
				<el-table-column label="ID" prop="id" sortable></el-table-column>
				<el-table-column label="Email Address" prop="email" sortable></el-table-column>
				<el-table-column label="On Post" prop="post_title"></el-table-column>
				<el-table-column label="City" prop="city"></el-table-column>
				<el-table-column label="State" prop="state"></el-table-column>
				<el-table-column label="Zipcode" prop="zip"></el-table-column>
				<el-table-column label="Country" prop="country"></el-table-column>
				<el-table-column label="IP" prop="ip_location"></el-table-column>
				<el-table-column>
					<template #header>Action</template>
					<template #default="scope">
						<el-popconfirm :icon="InfoFilled" cancel-button-text="No" confirm-button-text="Yes" icon-color="red" title="Are you sure to delete this?" @confirm="delete_subscriber(scope.row.id)">
							<template #reference>
								<el-button :icon="Delete" circle type="danger"></el-button>
							</template>
						</el-popconfirm>
					</template>
				</el-table-column>
			</el-table>
			<el-empty v-else :image-size="200" description="No Data"></el-empty>
		</div>
	</div>
</template>
<script>

import { Delete, EditPen, InfoFilled } from "@element-plus/icons-vue";

export default {
	computed : {
		EditPen ()
		{
			return EditPen
		},
		InfoFilled ()
		{
			return InfoFilled
		},
		Delete ()
		{
			return Delete
		}
	},
	data ()
	{
		return {
			page_def_loader : false,
			subscribers     : []
		};
	},
	mounted ()
	{
		this.get_subscribers();
	},
	methods : {
		get_subscribers ()
		{
			this.page_def_loader = true;
			$.ajax( {
				url      : this.$WPE_AJAX_URL,
				type     : 'GET',
				data     : {
					action : this.$WPE_AJAX_PREFIX + '_get_forms_entries',
					nonce  : this.$WPE_NONCE
				},
				success  : res =>
				{
					this.subscribers = res.data;
				},
				error    : error =>
				{
					if ( 401 === error.status )
					{
						this.$alert( error.responseJSON.data, {
							type                     : "error",
							confirmButtonText        : "OK",
							dangerouslyUseHTMLString : true
						} );
					}
					else
					{
						this.$alert( error.status + ': ' + error.responseText, {
							type                     : "error",
							confirmButtonText        : "OK",
							dangerouslyUseHTMLString : true
						} );
					}
				},
				complete : res => {this.page_def_loader = false}
			} );
		},
		delete_subscriber ( $id )
		{
			this.page_def_loader = true;
			$.ajax( {
				url      : this.$WPE_AJAX_URL,
				type     : 'POST',
				data     : {
					action : this.$WPE_AJAX_PREFIX + '_dell_forms_entries',
					id     : $id,
					nonce  : this.$WPE_NONCE
				},
				success  : res =>
				{
					this.get_subscribers();
				},
				error    : error =>
				{
					if ( 401 === error.status )
					{
						this.$alert( error.responseJSON.data, {
							type                     : "error",
							confirmButtonText        : "OK",
							dangerouslyUseHTMLString : true
						} );
					}
					else
					{
						this.$alert( error.status + ': ' + error.responseText, {
							type                     : "error",
							confirmButtonText        : "OK",
							dangerouslyUseHTMLString : true
						} );
					}
				},
				complete : res => {this.page_def_loader = false}
			} );
		}
	}
};
</script>
