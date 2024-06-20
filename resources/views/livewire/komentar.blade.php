<div>
    @auth
        <!-- Comment Form Start -->
        <div class="mb-3">
            <div class="section-title mb-0">
                <h4 class="m-0 text-uppercase font-weight-bold">Tinggalkan Komentar</h4>
            </div>
            <div class="bg-white border border-top-0 p-4">
                <form wire:submit.prevent="tambahKomentar">
                    <div class="form-group">
                        <textarea wire:model.defer="isi" id="message" cols="30" rows="5"
                            class="form-control @error('isi') is-invalid @enderror" placeholder="Tulis Komentar"></textarea>
                        @error('isi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-0">
                        <input type="submit" value="Kirim Komentar"
                            class="btn btn-primary font-weight-semi-bold py-2 px-3">
                    </div>
                </form>
            </div>
        </div>
        <!-- Comment Form End -->
    @endauth
    @guest
        <div class="mb-3">
            <div class="section-title mb-0">
                <h4 class="m-0 text-uppercase font-weight-bold">Tinggalkan Komentar</h4>
            </div>
            <div class="bg-white border border-top-0 p-4">
                <p>Anda harus <a href="{{ route('auth.index') }}">login</a> terlebih dahulu untuk dapat berkomentar.</p>
            </div>
        </div>
    @endguest

    <!-- Comment List Start -->
    <div class="mb-3">
        <div class="section-title mb-0">
            <h4 class="m-0 text-uppercase font-weight-bold">{{ $total_komentar }} Komentar</h4>
        </div>
        @foreach ($komentar as $komentarItem)
            <div class="bg-white border border-top-0 p-4" id="komentar-{{ $komentarItem->id_komentar }}">
                <div class="media mb-3">
                    <img src="{{ asset('assets-fe/img/user.png') }}" alt="Image" class="img-fluid mr-3 mt-1"
                        style="width: 45px;">
                    <div class="media-body">
                        <h6><a class="text-secondary font-weight-bold"
                                href="#">{{ $komentarItem->user->name }}</a>
                            <small><i>{{ $komentarItem->created_at }}</i></small>
                        </h6>
                        <p>{{ $komentarItem->isi }}</p>
                        @auth
                            <button class="btn btn-sm btn-outline-secondary"
                                wire:click='selectReply({{ $komentarItem->id_komentar }})'>Balas</button>
                            @if ($komentarItem->id_user == Auth::user()->id_user)
                                <button class="btn btn-sm btn-outline-secondary"
                                    wire:click="selectEdit({{ $komentarItem->id_komentar }})">Ubah</button>
                                <button class="btn btn-sm btn-outline-secondary"
                                    wire:click="hapusKomentar({{ $komentarItem->id_komentar }})">Hapus</button>
                            @endif
                        @endauth
                        @if (isset($comment_id) && $comment_id == $komentarItem->id_komentar)
                            <form wire:submit.prevent="balasKomentar" class="my-3">
                                <div class="form-group">
                                    <textarea wire:model.defer="isi2" id="message" cols="30" rows="5"
                                        class="form-control @error('isi2') is-invalid @enderror" placeholder="Tulis Balasan"></textarea>
                                    @error('isi2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-0">
                                    <input type="submit" value="Balas Komentar"
                                        class="btn btn-info font-weight-semi-bold py-2 px-3">
                                </div>
                            </form>
                        @endif
                        @if (isset($edit_comment_id) && $edit_comment_id == $komentarItem->id_komentar)
                            <form wire:submit.prevent="editKomentar" class="my-3">
                                <div class="form-group">
                                    <textarea wire:model.defer="isi2" id="message" cols="30" rows="5"
                                        class="form-control @error('isi2') is-invalid @enderror" placeholder="Tulis Komentar"></textarea>
                                    @error('isi2')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-0">
                                    <input type="submit" value="Kirim Komentar"
                                        class="btn btn-success font-weight-semi-bold py-2 px-3">
                                </div>
                            </form>
                        @endif

                        @if ($komentarItem->childrenComments)
                            @foreach ($komentarItem->childrenComments as $komentarItem2)
                                <div class="mx-4">
                                    <div class="media mt-4">
                                        <img src="{{ asset('assets-fe/img/user.png') }}" alt="Image"
                                            class="img-fluid mr-3 mt-1" style="width: 45px;">
                                        <div class="media-body">
                                            <h6><a class="text-secondary font-weight-bold"
                                                    href="#">{{ $komentarItem2->user->name }}</a>
                                                <small><i>{{ $komentarItem2->created_at }}</i></small>
                                            </h6>
                                            <p>{{ $komentarItem2->isi }}</p>
                                            @auth
                                                <button class="btn btn-sm btn-outline-secondary"
                                                    wire:click='selectReply({{ $komentarItem2->id_komentar }})'>Balas</button>
                                                @if ($komentarItem2->id_user == Auth::user()->id_user)
                                                    <button class="btn btn-sm btn-outline-secondary"
                                                        wire:click="selectEdit({{ $komentarItem2->id_komentar }})">Ubah</button>
                                                    <button class="btn btn-sm btn-outline-secondary"
                                                        wire:click="hapusKomentar({{ $komentarItem2->id_komentar }})">Hapus</button>
                                                @endif
                                            @endauth
                                        </div>
                                    </div>
                                    @if (isset($comment_id) && $comment_id == $komentarItem2->id_komentar)
                                        <form wire:submit.prevent="balasKomentar" class="my-3 mx-4">
                                            <div class="form-group">
                                                <textarea wire:model.defer="isi2" id="message" cols="30" rows="5"
                                                    class="form-control @error('isi2') is-invalid @enderror" placeholder="Tulis Balasan"></textarea>
                                                @error('isi2')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-0">
                                                <input type="submit" value="Balas Komentar"
                                                    class="btn btn-info font-weight-semi-bold py-2 px-3">
                                            </div>
                                        </form>
                                    @endif

                                    @if (isset($edit_comment_id) && $edit_comment_id == $komentarItem2->id_komentar)
                                        <form wire:submit.prevent="editKomentar" class="my-3 mx-4">
                                            <div class="form-group">
                                                <textarea wire:model.defer="isi2" id="message" cols="30" rows="5"
                                                    class="form-control @error('isi2') is-invalid @enderror" placeholder="Tulis Komentar"></textarea>
                                                @error('isi2')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group mb-0">
                                                <input type="submit" value="Kirim Komentar"
                                                    class="btn btn-success font-weight-semi-bold py-2 px-3">
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <hr>
            </div>
        @endforeach
    </div>
    <!-- Comment List End -->
</div>
