<?php


use Phinx\Migration\AbstractMigration;

class AddUserToCategoryCosts extends AbstractMigration
{
    public function up()
    {
        $this->table('category_costs')
            ->addColumn('user_id','integer')
            ->addForeignKey('user_id','users','id')
            ->save();
    }
    public function down()
    {
        $table = $this->table('category_costs');
        $table->dropForeignKey('user_id')->save();
    }
}
