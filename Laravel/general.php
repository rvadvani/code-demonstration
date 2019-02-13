// how to use trans, commit & rollback

DB::beginTransaction();

try {
    DB::insert(...);
    DB::commit();
} catch (\Exception $e) {
    DB::rollback();
}
