<style>html,body { padding: 0; margin:0; }</style>
<div style="font-family:Arial,Helvetica,sans-serif; line-height: 1.5; font-weight: normal; font-size: 15px; color: #2F3044; min-height: 100%; margin:0; padding:0; width:100%; background-color:#edf2f7">
	<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse:collapse;margin:0 auto; padding:0; max-width:600px">
		<tbody>
			<tr>
				<td align="center" valign="center" style="text-align:center; padding: 40px">
					<a href="{{ route('web.auth.verify', $token)}}" rel="noopener" target="_blank">
						<img src="{{asset('logo.jpg')}}" style="height: 45px" alt="logo">
							<tr>
								<td align="left" valign="center">
									<div style="text-align:left; margin: 0 20px; padding: 40px; background-color:#ffffff; border-radius: 6px">
										<!--begin:Email content-->
										<div style="padding-bottom: 30px; font-size: 17px;">
											<strong>Hai {{$notifiable->name}},</strong>
										</div>
										<div style="padding-bottom: 30px">
											Terima kasih telah bergabung dengan kami. <br>
											ID Pengguna Anda : {{$notifiable->username}} <br>
											Kata Sandi Anda : {{$pass}} <br>
											Untuk mengaktifkan akun Anda, silakan klik tombol di bawah ini untuk memverifikasi alamat email Anda. Setelah diaktifkan, Anda akan memiliki akses penuh ke situs web kami.
										</div>
										<div style="padding-bottom: 40px; text-align:center;">
											<a href="{{ route('web.auth.verify', $token)}}" rel="noopener" style="text-decoration:none;display:inline-block;text-align:center;padding:0.75575rem 1.3rem;font-size:0.925rem;line-height:1.5;border-radius:0.35rem;color:#ffffff;background-color:#009EF7;border:0px;margin-right:0.75rem!important;font-weight:600!important;outline:none!important;vertical-align:middle" target="_blank">Aktivasi Akun</a>
										</div>
										<div style="border-bottom: 1px solid #eeeeee; margin: 15px 0"></div>
										<div style="padding-bottom: 50px; word-wrap: break-all;">
											<p style="margin-bottom: 10px;">Tombol tidak berfungsi? Coba tempel URL ini ke browser Anda:</p>
											<a href="{{ route('web.auth.verify', $token)}}" rel="noopener" target="_blank" style="text-decoration:none;color: #009EF7">{{ route('web.auth.verify', $token)}}</a>
										</div>
										<!--end:Email content-->
										<div style="padding-bottom: 10px">Salam Hangat,
										<br>Kementerian Pekerjaan Umum dan Perumahan Rakyat.
										<tr>
											<td align="center" valign="center" style="font-size: 13px; text-align:center;padding: 20px; color: #6d6e7c;">
												<p>Jl. Pattimura No. 20 Kebayoran Baru Jakarta Selatan 12110.</p>
												<p>Copyright ©
												<a href="{{ route('web.auth.verify', $token)}}" rel="noopener" target="_blank">Kementerian Pekerjaan Umum dan Perumahan Rakyat</a>.</p>
											</td>
										</tr></br></div>
									</div>
								</td>
							</tr>
						</img>
					</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>