<?php

use Phinx\Migration\AbstractMigration;

class CreateBillPaysTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function up()
    {
        $this->table('bill_pays')
            ->addColumn('date_launch','date')
            ->addColumn('name','string')
            ->addColumn('value','float')
            ->addColumn('user_id','integer')
            ->addColumn('category_cost_id','integer')
            ->addColumn('created_at','datetime')
            ->addColumn('updated_at','datetime')
            ->addForeignKey('user_id','users','id', 
            array('delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'))
            ->addForeignKey('category_cost_id','category_costs','id', 
            array('delete'=> 'NO_ACTION', 'update'=> 'NO_ACTION'))
            ->save();
    }

    public function down()
    {
        $table = $this->table('bill_pays');
        $table->dropForeignKey('user_id')
            ->dropForeignKey('category_cost_id')
            ->drop()->save();
    }

}
