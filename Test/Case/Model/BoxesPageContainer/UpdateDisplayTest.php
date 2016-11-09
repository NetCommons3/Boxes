<?php
/**
 * BoxesPageContainer::updateDisplay()のテスト
 *
 * @author Noriko Arai <arai@nii.ac.jp>
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @link http://www.netcommons.org NetCommons Project
 * @license http://www.netcommons.org/license.txt NetCommons License
 * @copyright Copyright 2014, NetCommons Project
 */

App::uses('BoxesModelTestCase', 'Boxes.TestSuite');

/**
 * BoxesPageContainer::updateDisplay()のテスト
 *
 * @author Shohei Nakajima <nakajimashouhei@gmail.com>
 * @package NetCommons\Boxes\Test\Case\Model\BoxesPageContainer
 */
class BoxesPageContainerUpdateDisplayTest extends BoxesModelTestCase {

/**
 * Model name
 *
 * @var string
 */
	protected $_modelName = 'BoxesPageContainer';

/**
 * Method name
 *
 * @var string
 */
	protected $_methodName = 'updateDisplay';

/**
 * ボックスのHeader,FooterのDataProvider
 *
 * ### 戻り値
 *  - boxContanerId BoxesPageContainerId
 *  - data 登録データ
 *
 * @return array テストデータ
 */
	public function dataProviderHeaderAndFooter() {
		$results = array();
		$results[] = array(
			'boxesPageContanerId' => '29',
			'data' => array(
				'BoxesPageContainer' => array(
					'id' => '30',
					'page_container_id' => '1',
					'page_id' => '1',
					'container_type' => '1',
					'box_id' => '5',
					'is_published' => true,
				),
			),
		);
		$results[] = array(
			'boxesPageContanerId' => '42',
			'data' => array(
				'BoxesPageContainer' => array(
					'id' => '44',
					'page_container_id' => '5',
					'page_id' => '1',
					'container_type' => '5',
					'box_id' => '20',
					'is_published' => true,
				),
			),
		);
		return $results;
	}

/**
 * updateDisplay()のHeaderおよびFooterのテスト
 *
 * @param int $boxContanerId BoxesPageContainerId
 * @param array $data テストデータ
 * @return void
 * @dataProvider dataProviderHeaderAndFooter
 */
	public function testHeaderAndFooter($boxContanerId, $data) {
		$model = $this->_modelName;
		$methodName = $this->_methodName;

		//事前チェック
		$this->__precheck($boxContanerId, $data);

		//テスト実施
		$result = $this->$model->$methodName($data);
		$this->assertTrue($result);

		//チェック
		$result = $this->$model->find('all', array(
			'recursive' => -1,
			'fields' => array('id'),
			'conditions' => array(
				'page_container_id' => $data[$model]['page_container_id'],
				'page_id' => $data[$model]['page_id'],
				'container_type' => $data[$model]['container_type'],
				'is_published' => true,
			)
		));
		$expected = array(
			0 => array('BoxesPageContainer' => array(
				'id' => $data[$model]['id']
			))
		);
		$this->assertEquals($result, $expected);
	}

/**
 * ボックスのHeader,FooterのDataProvider
 *
 * ### 戻り値
 *  - boxContanerId BoxesPageContainerId
 *  - data 登録データ
 *
 * @return array テストデータ
 */
	public function dataProviderMajorAndMinor() {
		$results = array();
		$results[] = array(
			'boxesPageContanerId' => '33',
			'data' => array(
				'BoxesPageContainer' => array(
					'id' => '34',
					'page_container_id' => '2',
					'page_id' => '1',
					'container_type' => '2',
					'box_id' => '8',
					'is_published' => true,
				),
			),
		);
		$results[] = array(
			'boxesPageContanerId' => '38',
			'data' => array(
				'BoxesPageContainer' => array(
					'id' => '41',
					'page_container_id' => '4',
					'page_id' => '1',
					'container_type' => '4',
					'box_id' => '24',
					'is_published' => true,
				),
			),
		);
		return $results;
	}

/**
 * updateDisplay()のMajor(左)およびMinor(右)のテスト
 *
 * @param int $boxContanerId BoxesPageContainerId
 * @param array $data テストデータ
 * @return void
 * @dataProvider dataProviderMajorAndMinor
 */
	public function testMajorAndMinor($boxContanerId, $data) {
		$model = $this->_modelName;
		$methodName = $this->_methodName;

		//事前チェック
		$this->__precheck($boxContanerId, $data);

		//テスト実施
		$result = $this->$model->$methodName($data);
		$this->assertTrue($result);

		//チェック
		$result = $this->$model->find('all', array(
			'recursive' => -1,
			'fields' => array('id'),
			'conditions' => array(
				'page_container_id' => $data[$model]['page_container_id'],
				'page_id' => $data[$model]['page_id'],
				'container_type' => $data[$model]['container_type'],
				'is_published' => true,
			)
		));
		$expected = array(
			0 => array('BoxesPageContainer' => array(
				'id' => $boxContanerId
			)),
			1 => array('BoxesPageContainer' => array(
				'id' => $data[$model]['id']
			))
		);
		$this->assertEquals($result, $expected);
	}

/**
 * 事前チェック
 *
 * @param int $boxContanerId BoxesPageContainerId
 * @param array $data テストデータ
 * @return void
 */
	private function __precheck($boxContanerId, $data) {
		$model = $this->_modelName;

		//事前チェック
		$result = $this->$model->find('all', array(
			'recursive' => -1,
			'fields' => array('id'),
			'conditions' => array(
				'page_container_id' => $data[$model]['page_container_id'],
				'page_id' => $data[$model]['page_id'],
				'container_type' => $data[$model]['container_type'],
				'is_published' => true,
			)
		));
		$expected = array(
			0 => array('BoxesPageContainer' => array(
				'id' => $boxContanerId
			))
		);
		$this->assertEquals($result, $expected);
	}

/**
 * updateDisplay()の存在しないデータテスト
 *
 * @return void
 */
	public function testExistsError() {
		$model = $this->_modelName;
		$methodName = $this->_methodName;

		//テストデータ
		$data = $this->dataProviderHeaderAndFooter()[0]['data'];
		$data['BoxesPageContainer']['id'] = '9999';

		//テスト実施
		$result = $this->$model->$methodName($data);
		$this->assertFalse($result);
	}

/**
 * updateDisplay()のバリデーションエラーテスト
 *
 * @return void
 */
	public function testValidationError() {
		$model = $this->_modelName;
		$methodName = $this->_methodName;

		//テストデータ
		$data = $this->dataProviderHeaderAndFooter()[0]['data'];
		$data['BoxesPageContainer']['is_published'] = 'aaaa';

		//テスト実施
		$result = $this->$model->$methodName($data);
		$this->assertFalse($result);
	}

/**
 * updateDisplay()のsaveField()エラーテスト
 *
 * @return void
 */
	public function testSaveFieldOnFaulure() {
		$model = $this->_modelName;
		$methodName = $this->_methodName;

		//テストデータ
		$this->_mockForReturnFalse($model, $model, 'saveField');
		$data = $this->dataProviderHeaderAndFooter()[0]['data'];

		//テスト実施
		$this->setExpectedException('InternalErrorException');
		$this->$model->$methodName($data);
	}

/**
 * updateDisplay()のupdateAll()エラーテスト
 *
 * @return void
 */
	public function testUpdateAllOnFaulure() {
		$model = $this->_modelName;
		$methodName = $this->_methodName;

		//テストデータ
		$this->_mockForReturnFalse($model, $model, 'updateAll');
		$data = $this->dataProviderHeaderAndFooter()[0]['data'];

		//テスト実施
		$this->setExpectedException('InternalErrorException');
		$this->$model->$methodName($data);
	}

}
