<template>
	<!-- <button type='submit' :class='classes' @click='toggle'>
		<span class='glyphicon glyphicon-heart'></span>
		<span v-text='count'></span>
	</button> -->
    <div>
		<div v-if = '!isFollowing'>
        	<button class="btn btn--gradient"  @click='follow'>Follow</button>
		</div>
		<div v-else>
			<button class="btn btn--gradient"  @click='unfollow'>Unfollow</button>
		</div>
    </div>
    
</template>

<script>
export default {
	props: [
		'isfollowing',
		 'user'
	],
	data(){
		return {
			isFollowing : this.isfollowing,
			user :this.user
		}
	},
	mounted: function(){
		console.log(this.user);
	},
	computed: {
		
		endpoint(){
            return "/profiles/" + this.user + "/follow";
		}
	},
	methods: {
		follow(){
			axios.get("/profiles/" + this.user+ "/follow");
			this.isFollowing = true;
		},
		unfollow(){
			axios.get("/profiles/" + this.user+ "/unfollow");
			this.isFollowing = false;
		}
	}
}
</script>