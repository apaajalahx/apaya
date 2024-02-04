class Test {

  public Page<ObjectEntity> getData(Pegeable pageable) {
      Page<ObjectEntity> entities = objectEntityRepository.findAll(pageable);
      Page<ObjectDto> dtoPage = entities.map(new Function<ObjectEntity, ObjectDto>() {
          @Override
          public ObjectDto apply(ObjectEntity entity) {
              ObjectDto dto = new ObjectDto();
              // Conversion logic
      
              return dto;
          }
      });
      return dtoPage;
  } 

}
