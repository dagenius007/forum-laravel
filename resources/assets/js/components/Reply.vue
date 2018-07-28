<template>
	
	<div :id="'reply-'+id" class=''>
		<div class="col-md-2">
			<div class="replies__img" :style="{ backgroundImage: `url('${'http://localhost:8000/img/users/'+data.owner.display_img}')` }" >
			<div v-if='canUpdate'>
				<div class="circle"></div>
			</div>
				
			</div>
		</div>
		<div class="col-md-9">
			<div class="replies__content">
				
				<div class="replies__content--heading">
					<p><a :href="'/profiles/'+data.owner.id" v-text="data.owner.name"></a></p> 
					<div>
						<div> {{ data.created_at }} </div>
						<div v-if='signedIn'>
							<favorite :reply='data'></favorite>
						</div>
					</div>
					
				</div>
				<div v-if='editing'>
					<div class='form-group'>
						<textarea class='form-control' v-model='body'></textarea>
					</div>
					<button class='btn btn-xs btn--gradient ' @click='update'>Update</button>
					<button class='btn btn-xs btn--gradient' @click='editing = false'>Cancel</button>
				</div>
				<div v-else class="replies__content--body">
					{{ body }}
				</div>
				<div class="replies__content--footer" v-if='canUpdate'>
					<button class='btn btn-xs mr-1 white btn--gradient' @click='editing = true'>Edit</button>
					<button class='btn btn-xs btn-danger mr-1' @click='destroy'>Delete</button>
				</div>
			</div>
		</div>
	</div> 
</template>

<script>
import Favorite from './Favorite.vue'
import moment from 'moment'

export default {
	props: ['data'],
	components: {
		Favorite
	},
	data(){
		return {
			id: this.data.id,
			editing: false,
			body: this.data.body 	
		};
	},
	computed: {
		signedIn(){
			return window.App.signedIn;
		},
		canUpdate(){
			return this.authorize(user => this.data.user_id == user.id);
		},
		ago(){
			// momentjs date formating (Z let's moment know it is UTC)
			return moment(this.data.created_at + 'Z').fromNow();
		}
	},
	methods: {
		update(){
			axios.patch("/replies/" + this.data.id, {
				body: this.body
			});

			this.editing = false;
			flash('Your reply was updated');
		},
		destroy(){
			axios.delete("/replies/" + this.data.id);
			this.$emit('deleted', this.data.id);
		}
	}
}
</script>