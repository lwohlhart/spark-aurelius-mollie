<spark-send-invitation :user="user" :team="team" :billable-type="billableType" inline-template>
    <div class="card card-default">
        <div class="card-header">Send Invitation</div>

        <div class="card-body">
            <!-- Success Message -->
            <div class="alert alert-success" v-if="form.successful">
                The invitation has been sent!
            </div>

            <form role="form" v-if="canInviteMoreTeamMembers">
                <!-- E-Mail Address -->
                <div class="form-group row">
                    <label class="col-md-4 control-label text-md-right">E-Mail Address</label>

                    <div class="col-md-6">
                        <input type="email" class="form-control" name="email" v-model="form.email" :class="{'is-invalid': form.errors.has('email')}">
                        <span class="invalid-feedback" v-if="hasTeamMembersLimit">
                            You currently have @{{ remainingTeamMembers }} invitation(s) remaining.
                        </span>
                        <span class="invalid-feedback" v-show="form.errors.has('email')">
                            @{{ form.errors.get('email') }}
                        </span>
                    </div>
                </div>

                <!-- Send Invitation Button -->
                <div class="form-group row">
                    <div class="offset-md-4 col-md-6">
                        <button type="submit" class="btn btn-primary"
                                @click.prevent="send"
                                :disabled="form.busy">

                            <span v-if="form.busy">
                                <i class="fa fa-btn fa-spinner fa-spin"></i> Sending
                            </span>

                            <span v-else>
                                Send Invitation
                            </span>
                        </button>
                    </div>
                </div>
            </form>

            <div v-else>
                <span class="text-danger">
                    Your current plan doesn't allow you to invite more members, please <a href="{{ url('/settings#/subscription') }}">upgrade your subscription</a>.
                </span>
            </div>
        </div>
    </div>
</spark-send-invitation>
