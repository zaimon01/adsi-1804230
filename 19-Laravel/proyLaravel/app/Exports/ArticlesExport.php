<?php 

	namespace App\Exports;


	use Illuminate\Contracts\View\View;
	use Maatwebsite\Excel\Concerns\FromView;

	use App\Article;

	class ArticlesExport implements FromView {
		public function view(): View {
			return view('articles.excel', [
				'articles' => Article::all()
			]);
		} 
	}