<?php


use Phinx\Migration\AbstractMigration;

class AddUserToCategoryCosts extends AbstractMigration
{
    public function up()
    {
        $this->table('category_costs')
            ->addColumn('user_id','integer')
            ->addForeignKey('user_id','id','users')
            ->save();
    }
    public function down()
    {
        $this->table('category_costs')
            ->dropForeignKey('user_id')
            ->removeColumn('user_id');
    }
}
