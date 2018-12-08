<?php
declare(strict_types=1);
namespace App\Controller;

use App\Factory\CalculatorFactory;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CalculatorController
 * @package App\Controller
 */
class CalculatorController extends AbstractController
{
    /**
     * @var CalculatorFactory $factoryObject
     */
    private $factoryObject;

    /**
     * CalculatorController constructor.
     * @param CalculatorFactory $calculatorFactory
     */
    public function __construct(CalculatorFactory $calculatorFactory)
    {
        $this->factoryObject = $calculatorFactory;
    }

    /**
     * @Route("/calculator", name="calculator",methods={"POST","GET"})
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        try {
            $data = json_decode(
                $request->getContent(),
                true
            );
            if(empty($data['operation'])) {
                throw new Exception('Invalid operation', Response::HTTP_BAD_REQUEST);
            }
            $serviceObject = $this->factoryObject->getServiceObject($data['operation']);
            $result = $serviceObject->calculate($data['params']);
            return $this->json([
                'code' => Response::HTTP_OK,
                'message' => 'success!',
                'result' => $result,
            ]);
        } catch (Exception $exception) {
            return $this->json([
                'code' => $exception->getCode(),
                'message' => $exception->getMessage(),
                'result' => null
            ]);
        }
    }
}
