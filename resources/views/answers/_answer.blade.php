<answer :answer="{{ $answer }}" inline-template>

    <div class="media post">
        @include('shared._vote', [
            'model' => $answer
        ])
        <div class="media-body">


            <form v-if="editing" @submit.prevent="update">
                <div class="form-group">
                    <textarea rows="10" v-model="body" class="form-control" required></textarea>
                </div>
                <button class="btn btn-primary" :disabled="isInvalid">Update</button>
                <button @click="cancel" class="btn btn-outline-secondary" type="button">Cancel</button>
            </form>


            <div v-else>
                <div v-html="bodyHtml"></div>
                <div class="row">
                    <div class="col-4">
                        <div class="ml-auto">
                            <div class="ml-auto">
                                @can ('update', $answer)
                                    <a @click.prevent="edit" class="btn btn-sm btn-outline-info">Edit</a>
                                @endcan
        
                                @can ('delete', $answer)
                                    <button class="btn btn-sm btn-outline-danger" @click="destroy" >Delete</button>
                                @endcan
                            </div>
                        </div>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-4">
                        {{-- @include('shared._author', [
                        'model' =>$answer,
                        'label' => 'answered'
                        ]) --}}
                        <user-info :model="{{ $answer }}" label="Answerd"></user-info>
                    </div>
                </div>
            </div>
        </div>
    </div>

</answer>